<?php

namespace App\Filament\App\Resources\Games\Pages;

use App\Enums\GameStatus;
use App\Filament\App\Resources\Games\GameResource;
use App\Models\CashAccount;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\View\View;

class EditGame extends EditRecord
{
    protected static string $resource = GameResource::class;

    protected function getHeaderActions(): array
    {
        $gameAlreadyEnded = $this->record->status !== GameStatus::ACTIVE->value;

        return [
            ViewAction::make(),
            DeleteAction::make(),
            Action::make('submit')
                ->label('Submit and end Game')
                ->disabled($gameAlreadyEnded)
                ->tooltip(fn () => $gameAlreadyEnded ? 'Game has already ended' : null)
                ->modal()
                ->modalSubmitActionLabel('Submit and end Game')
                ->action(fn (array $data) => $this->record->endGame($data['cash_account']))
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('Game ended')
                )
                ->schema([
                    Select::make('cash_account')
                        ->options(CashAccount::all()->pluck('name', 'id'))
                        ->label('Cash Account')
                        ->required(),
                ]),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id();

        return $data;
    }

    public function getFooter(): ?View
    {
        return null;
    }
}
