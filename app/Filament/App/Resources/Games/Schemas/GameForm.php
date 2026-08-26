<?php

namespace App\Filament\App\Resources\Games\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('season_id')
                    ->relationship('season', 'name')
                    ->default(1)
                    ->required(),
                Select::make('contribution_rule_id')
                    ->relationship('contributionRule', 'name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('notes'),
                Select::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->hidden() //  if schema is create
                    ->required(),
                TextInput::make('location'),
            ]);
    }
}
