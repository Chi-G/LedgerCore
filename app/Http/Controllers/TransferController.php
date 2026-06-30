<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\LedgerService;
use App\Http\Requests\TransferRequest;
use App\Exceptions\InsufficientFundsException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransferController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $accounts = $user->accounts;
        $isTeller = $user->role === 'teller';
        return view('transfers.index', compact('accounts', 'isTeller'));
    }

    public function store(TransferRequest $request, LedgerService $ledgerService)
    {
        $isTeller = $request->user()->role === 'teller';
        $type = $request->input('transaction_type', 'transfer');
        
        // network/processing delay to show the spinner
        sleep(2);

        try {
            if ($isTeller) {
                if ($type === 'deposit') {
                    $toAccount = Account::where('account_number', $request->destination_account)->firstOrFail();
                    $reference = $request->input('reference') ?? 'DEP-' . strtoupper(Str::random(8));
                    
                    $ledgerService->recordDeposit(
                        $toAccount,
                        (float) $request->amount,
                        $reference
                    );
                    return redirect()->route('teller.transfers.index')->with('success', 'Deposit processed successfully.');
                }
                
                $fromAccount = Account::where('account_number', $request->source_account)->firstOrFail();
                
                // Secure PIN Validation for teller withdrawals and transfers
                if (!\Illuminate\Support\Facades\Hash::check($request->pin, $fromAccount->user->transaction_pin)) {
                    return back()->withErrors(['pin' => 'Invalid transaction PIN. Customer authorization failed.'])->withInput();
                }

                if ($type === 'withdrawal') {
                    $reference = $request->input('reference') ?? 'WDW-' . strtoupper(Str::random(8));
                    $ledgerService->recordWithdrawal(
                        $fromAccount,
                        (float) $request->amount,
                        $reference
                    );
                    return redirect()->route('teller.transfers.index')->with('success', 'Withdrawal processed successfully.');
                } elseif ($type === 'transfer') {
                    $toAccount = Account::where('account_number', $request->destination_account)->firstOrFail();
                    $reference = $request->input('reference') ?? 'TRF-' . strtoupper(Str::random(8));
                    $ledgerService->recordTransfer(
                        $fromAccount,
                        $toAccount,
                        (float) $request->amount,
                        $reference
                    );
                    return redirect()->route('teller.transfers.index')->with('success', 'Transfer processed successfully.');
                }
            } else {
                $toAccount = Account::where('account_number', $request->destination_account)->firstOrFail();
                $reference = $request->input('reference') ?? 'TRF-' . strtoupper(Str::random(8));
                $fromAccount = Account::where('user_id', $request->user()->id)
                                      ->where('account_number', $request->source_account)
                                      ->firstOrFail();

                $ledgerService->recordTransfer(
                    $fromAccount,
                    $toAccount,
                    (float) $request->amount,
                    $reference
                );
                return redirect()->route('transfers.index', ['uuid' => $request->user()->uuid])->with('success', 'Transfer completed successfully.');
            }
        } catch (InsufficientFundsException $e) {
            return back()->withErrors(['amount' => 'Insufficient funds in the source account.'])->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Transaction failed. Please try again.'])->withInput();
        }
    }
}
