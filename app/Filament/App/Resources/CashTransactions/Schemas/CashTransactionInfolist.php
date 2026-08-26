<?php

namespace App\Filament\App\Resources\CashTransactions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CashTransactionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('cashAccount.name')
                    ->label('Cash account'),
                TextEntry::make('user.name')
                    ->label('User'),
                TextEntry::make('game.title')
                    ->label('Game'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('description')
                    ->placeholder('-'),
                TextEntry::make('type')
                    ->badge(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
