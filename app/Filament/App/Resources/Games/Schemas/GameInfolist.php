<?php

namespace App\Filament\App\Resources\Games\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GameInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('season.name')
                    ->label('Season'),
                TextEntry::make('contributionRule.name')
                    ->label('Contribution rule'),
                TextEntry::make('title'),
                TextEntry::make('notes')
                    ->placeholder('-'),
                TextEntry::make('played_at')
                    ->date(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('location')
                    ->placeholder('-'),
                Section::make('Details')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('createdBy.name')
                            ->label('Created by'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updatedBy.name')
                            ->placeholder('-')
                            ->label('Updated by'),
                    ]),
            ]);
    }
}
