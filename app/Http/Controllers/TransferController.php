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
        $accounts = $request->user()->accounts;
        return view('transfers.index', compact('accounts'));
    }

    public function store(TransferRequest $request, LedgerService $ledgerService)
    {
        // TransferRequest already validates that the source belongs to user,
        // and destination exists, but let's double check destination if needed.
        // Actually, the user asked for manual entry. Let's see what TransferRequest requires.
        
        $fromAccount = Account::where('user_id', $request->user()->id)
                              ->where('account_number', $request->source_account)
                              ->firstOrFail();

        $toAccount = Account::where('account_number', $request->destination_account)->firstOrFail();

        $reference = $request->input('reference') ?? 'TRF-' . strtoupper(Str::random(8));

        // Simulate network/processing delay to show the spinner
        sleep(2);

        try {
            $ledgerService->recordTransfer(
                $fromAccount,
                $toAccount,
                (float) $request->amount,
                $reference
            );
        } catch (InsufficientFundsException $e) {
            return back()->withErrors(['amount' => 'Insufficient funds in the source account.'])->withInput();
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Transfer failed. Please try again.'])->withInput();
        }

        return redirect()->route('transfers.index')->with('success', 'Transfer completed successfully.');
    }
}
