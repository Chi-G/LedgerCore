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
        $type = $this->input('transaction_type', 'transfer');

        $rules = [
            'amount' => ['required', 'numeric', 'min:0.01'],
            'reference' => ['nullable', 'string', 'unique:ledger_entries,reference'],
        ];

        if ($isTeller) {
            $rules['transaction_type'] = ['required', 'in:deposit,withdrawal,transfer'];
            
            if ($type === 'deposit') {
                $rules['destination_account'] = ['required', 'string', 'exists:accounts,account_number'];
            } elseif ($type === 'withdrawal') {
                $rules['source_account'] = ['required', 'string', 'exists:accounts,account_number'];
                $rules['pin'] = ['required', 'string'];
            } elseif ($type === 'transfer') {
                $rules['source_account'] = ['required', 'string', 'exists:accounts,account_number'];
                $rules['destination_account'] = ['required', 'string', 'exists:accounts,account_number', 'different:source_account'];
                $rules['pin'] = ['required', 'string'];
            }
        } else {
            $rules['source_account'] = ['required', 'string', 'exists:accounts,account_number'];
            $rules['destination_account'] = ['required', 'string', 'exists:accounts,account_number', 'different:source_account'];
        }

        return $rules;
    }
}
