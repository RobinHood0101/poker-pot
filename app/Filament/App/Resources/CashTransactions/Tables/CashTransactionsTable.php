<?php

namespace App\Filament\App\Resources\CashTransactions\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CashTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('cashAccount.name')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('game.title')
                    ->searchable(),
                TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('my-transaction')
                    ->query(fn (Builder $query): Builder => $query->where('user_id', auth()->id())),
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
