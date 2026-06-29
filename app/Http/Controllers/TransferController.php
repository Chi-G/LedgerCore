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
        $toAccount = Account::where('account_number', $request->destination_account)->firstOrFail();
        $reference = $request->input('reference') ?? ($isTeller ? 'DEP-' : 'TRF-') . strtoupper(Str::random(8));

        // network/processing delay to show the spinner
        sleep(2);

        try {
            if ($isTeller) {
                $ledgerService->recordDeposit(
                    $toAccount,
                    (float) $request->amount,
                    $reference
                );
                return redirect()->route('teller.transfers.index')->with('success', 'Deposit processed successfully.');
            } else {
                $fromAccount = Account::where('user_id', $request->user()->id)
                                      ->where('account_number', $request->source_account)
                                      ->firstOrFail();

                $ledgerService->recordTransfer(
                    $fromAccount,
                    $toAccount,
                    (float) $request->amount,
                    $reference
                );
                return redirect()->route('transfers.index')->with('success', 'Transfer completed successfully.');
            }
        } catch (InsufficientFundsException $e) {
            return back()->withErrors(['amount' => 'Insufficient funds in the source account.'])->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Transaction failed. Please try again.'])->withInput();
        }
    }
}
