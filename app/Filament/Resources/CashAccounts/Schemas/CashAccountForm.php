<?php

namespace App\Filament\Resources\CashAccounts\Schemas;

use App\Enums\CashAccountType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CashAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->unique()
                    ->required(),
                Select::make('type')
                    ->options(CashAccountType::class)
                    ->required(),
            ]);
    }
}
