<?php

namespace App\Filament\App\Resources\Games\Pages;

use App\Enums\GameStatus;
use App\Filament\App\Resources\Games\GameResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGame extends CreateRecord
{
    protected static string $resource = GameResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = GameStatus::ACTIVE;
        $data['created_by'] = auth()->id();

        return $data;
    }
}
