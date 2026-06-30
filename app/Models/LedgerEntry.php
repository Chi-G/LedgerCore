<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LedgerEntry extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'direction', 'amount', 'type', 'reference'];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function getBaseReferenceAttribute(): string
    {
        return str_replace(['-debit', '-credit'], '', $this->reference);
    }

    public function getCounterpartyAttribute(): ?Account
    {
        if ($this->type !== 'transfer') {
            return null;
        }

        $counterpartyDirection = $this->direction === 'credit' ? 'debit' : 'credit';
        $counterpartyReference = $this->base_reference . '-' . $counterpartyDirection;

        $counterpartyEntry = self::where('reference', $counterpartyReference)->first();

        return $counterpartyEntry ? $counterpartyEntry->account : null;
    }

    public function getSenderAttribute(): ?Account
    {
        if ($this->type !== 'transfer') {
            return null;
        }
        return $this->direction === 'debit' ? $this->account : $this->counterparty;
    }

    public function getRecipientAttribute(): ?Account
    {
        if ($this->type !== 'transfer') {
            return null;
        }
        return $this->direction === 'credit' ? $this->account : $this->counterparty;
    }
}
