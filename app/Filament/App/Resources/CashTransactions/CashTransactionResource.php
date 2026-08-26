<?php

namespace App\Filament\App\Resources\CashTransactions;

use App\Filament\App\Resources\CashTransactions\Pages\ListCashTransactions;
use App\Filament\App\Resources\CashTransactions\Pages\ViewCashTransaction;
use App\Filament\App\Resources\CashTransactions\Schemas\CashTransactionForm;
use App\Filament\App\Resources\CashTransactions\Schemas\CashTransactionInfolist;
use App\Filament\App\Resources\CashTransactions\Tables\CashTransactionsTable;
use App\Models\CashTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CashTransactionResource extends Resource
{
    protected static ?string $model = CashTransaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArrowsRightLeft;

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return CashTransactionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CashTransactionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CashTransactionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCashTransactions::route('/'),
            'view' => ViewCashTransaction::route('/{record}'),
        ];
    }
}
