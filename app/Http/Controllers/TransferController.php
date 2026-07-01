<?php

namespace App\Http\Controllers;

use App\Ai\Agents\RiskAnalyzer;
use App\Events\TransferCompleted;
use App\Exceptions\InsufficientFundsException;
use App\Http\Requests\TransferRequest;
use App\Models\Account;
use App\Models\LedgerEntry;
use App\Services\LedgerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny', 'transfer');

        $user = $request->user();
        $accounts = $user->accounts;
        $isTeller = $user->role === 'teller';

        return view('transfers.index', compact('accounts', 'isTeller'));
    }

    public function analyzeRisk(Request $request)
    {
        Gate::authorize('analyze', 'transfer');

        $request->validate([
            'amount' => 'required|numeric',
            'destination_account' => 'required|string',
            'source_account' => 'required|string',
        ]);

        $amount = (float) $request->input('amount');
        $destination = $request->input('destination_account');
        $source = $request->input('source_account');

        $agent = new RiskAnalyzer;

        $prompt = "Evaluate this transfer: Source Account: $source, Destination Account: $destination, Amount: $amount";

        $response = (string) $agent->prompt($prompt);

        // Strip out markdown code blocks if AI wrapped it in ```json
        $response = str_replace(['```json', '```'], '', $response);
        $data = json_decode(trim($response), true);

        if (! $data) {
            return response()->json([
                'risk_score' => 50,
                'recommendation' => 'Review',
                'reasoning' => 'Unable to parse AI response.',
            ]);
        }

        return response()->json($data);
    }

    public function store(TransferRequest $request, LedgerService $ledgerService)
    {
        Gate::authorize('create', 'transfer');

        $isTeller = $request->user()->role === 'teller';
        $type = $request->input('transaction_type', 'transfer');
        $idempotencyKey = $request->input('idempotency_key');

        // Idempotency check: if we already processed this request, return success instantly
        if (LedgerEntry::query()->where('idempotency_key', '=', $idempotencyKey, 'and')->exists()) {
            return redirect()->back()->with('success', 'Transaction processed successfully (idempotent response).');
        }

        // network/processing delay to show the spinner
        sleep(2);

        try {
            if ($isTeller) {
                if ($type === 'deposit') {
                    $toAccount = Account::query()->where('account_number', '=', $request->destination_account, 'and')->firstOrFail();
                    $txId = 'DEP-'.strtoupper(Str::random(10));
                    $reference = $request->filled('reference') ? $txId.' - '.$request->input('reference') : $txId;

                    $ledgerService->recordDeposit(
                        $toAccount,
                        (float) $request->amount,
                        $reference,
                        $idempotencyKey
                    );

                    TransferCompleted::dispatch($toAccount, null, (float) $request->amount, $reference);

                    return redirect()->route('teller.transfers.index')->with('success', 'Deposit processed successfully.');
                }

                $fromAccount = Account::query()->where('account_number', '=', $request->source_account, 'and')->firstOrFail();

                // Secure PIN Validation for teller withdrawals and transfers
                if (! Hash::check($request->pin, $fromAccount->user->transaction_pin)) {
                    return back()->withErrors(['pin' => 'Invalid transaction PIN. Customer authorization failed.'])->withInput();
                }

                if ($type === 'withdrawal') {
                    $txId = 'WDW-'.strtoupper(Str::random(10));
                    $reference = $request->filled('reference') ? $txId.' - '.$request->input('reference') : $txId;
                    $ledgerService->recordWithdrawal(
                        $fromAccount,
                        (float) $request->amount,
                        $reference,
                        $idempotencyKey
                    );

                    TransferCompleted::dispatch(null, $fromAccount, (float) $request->amount, $reference);

                    return redirect()->route('teller.transfers.index')->with('success', 'Withdrawal processed successfully.');
                } elseif ($type === 'transfer') {
                    $toAccount = Account::query()->where('account_number', '=', $request->destination_account, 'and')->firstOrFail();
                    $txId = 'TRF-'.strtoupper(Str::random(10));
                    $reference = $request->filled('reference') ? $txId.' - '.$request->input('reference') : $txId;
                    $ledgerService->recordTransfer(
                        $fromAccount,
                        $toAccount,
                        (float) $request->amount,
                        $reference,
                        $idempotencyKey
                    );

                    TransferCompleted::dispatch($toAccount, $fromAccount, (float) $request->amount, $reference);

                    return redirect()->route('teller.transfers.index')->with('success', 'Transfer processed successfully.');
                }
            } else {
                $toAccount = Account::query()->where('account_number', '=', $request->destination_account, 'and')->firstOrFail();
                $txId = 'TRF-'.strtoupper(Str::random(10));
                $reference = $request->filled('reference') ? $txId.' - '.$request->input('reference') : $txId;
                $fromAccount = Account::query()->where('user_id', '=', $request->user()->id, 'and')
                    ->where('account_number', '=', $request->source_account, 'and')
                    ->firstOrFail();

                $ledgerService->recordTransfer(
                    $fromAccount,
                    $toAccount,
                    (float) $request->amount,
                    $reference,
                    $idempotencyKey
                );

                TransferCompleted::dispatch($toAccount, $fromAccount, (float) $request->amount, $reference);

                return redirect()->route('transfers.index', ['uuid' => $request->user()->uuid])->with('success', 'Transfer completed successfully.');
            }
        } catch (InsufficientFundsException $e) {
            return back()->withErrors(['amount' => 'Insufficient funds in the source account.'])->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Transaction failed. Please try again.'])->withInput();
        }
    }
}
