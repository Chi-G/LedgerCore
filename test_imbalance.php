<?php

use App\Models\LedgerEntry;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$transferCredits = LedgerEntry::where('type', 'transfer')->where('direction', 'credit')->sum('amount');
$transferDebits = LedgerEntry::where('type', 'transfer')->where('direction', 'debit')->sum('amount');
echo 'Credits: '.$transferCredits."\n";
echo 'Debits: '.$transferDebits."\n";
