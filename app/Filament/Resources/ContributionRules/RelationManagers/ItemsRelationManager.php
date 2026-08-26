<?php

namespace App\Filament\Resources\ContributionRules\RelationManagers;

use App\Filament\Resources\ContributionRules\ContributionRuleResource;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $relatedResource = ContributionRuleResource::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('position')
                    ->required()
                    ->minValue(1)
                    ->maxValue(100)
                    ->integer(),
                TextInput::make('amount')
                    ->required()
                    ->default(0)
                    ->minValue(0)
                    ->maxValue(10000)
                    ->numeric(),
                TextInput::make('description'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ])
            ->columns([
                TextColumn::make('position'),
                TextColumn::make('amount'),
            ]);
    }
}
