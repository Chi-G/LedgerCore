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
        return [
            'source_account' => ['required', 'string', 'exists:accounts,account_number'],
            'destination_account' => ['required', 'string', 'exists:accounts,account_number', 'different:source_account'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'reference' => ['nullable', 'string', 'unique:ledger_entries,reference'],
        ];
    }
}
