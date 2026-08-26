<?php

namespace App\Filament\App\Resources\CashTransactions\Pages;

use App\Filament\App\Resources\CashTransactions\CashTransactionResource;
use Filament\Resources\Pages\ListRecords;

class ListCashTransactions extends ListRecords
{
    protected static string $resource = CashTransactionResource::class;
}
