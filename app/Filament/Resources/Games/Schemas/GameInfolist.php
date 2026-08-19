<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GameInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('season_id')
                    ->numeric(),
                TextEntry::make('contribution_rule_id')
                    ->numeric(),
                TextEntry::make('notes')
                    ->placeholder('-'),
                TextEntry::make('played_at')
                    ->date(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('location')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
