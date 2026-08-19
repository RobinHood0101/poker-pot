<?php

namespace App\Filament\Resources\CashTransactions\Schemas;

use App\Enums\TransactionType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CashTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('cash_account_id')
                    ->relationship('cashAccount', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('game_id')
                    ->relationship('game', 'title')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('description'),
                Select::make('type')
                    ->options(TransactionType::class)
                    ->required(),
            ]);
    }
}
