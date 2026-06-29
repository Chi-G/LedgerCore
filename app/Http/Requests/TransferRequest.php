<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isTeller = $this->user() && $this->user()->role === 'teller';

        return [
            'source_account' => $isTeller ? ['nullable'] : ['required', 'string', 'exists:accounts,account_number'],
            'destination_account' => array_filter([
                'required', 
                'string', 
                'exists:accounts,account_number', 
                $isTeller ? '' : 'different:source_account'
            ]),
            'amount' => ['required', 'numeric', 'min:0.01'],
            'reference' => ['nullable', 'string', 'unique:ledger_entries,reference'],
        ];
    }
}
