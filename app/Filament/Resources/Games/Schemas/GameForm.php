<?php

namespace App\Filament\Resources\Games\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GameForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('season_id')
                    ->relationship('season', 'name')
                    ->required(),
                Select::make('contribution_rule_id')
                    ->relationship('contributionRule', 'name')
                    ->required(),
                TextInput::make('notes'),
                DatePicker::make('played_at')
                    ->required(),
                Select::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->required(),
                TextInput::make('location'),
            ]);
    }
}
