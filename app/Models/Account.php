<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'account_number', 'type'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ledgerEntries(): HasMany
    {
        return $this->hasMany(LedgerEntry::class);
    }

    public function balance(): float
    {
        $credits = $this->ledgerEntries()->where('direction', 'credit')->sum('amount');
        $debits = $this->ledgerEntries()->where('direction', 'debit')->sum('amount');
        return (float) ($credits - $debits);
    }
}
