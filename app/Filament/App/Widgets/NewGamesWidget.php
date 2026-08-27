<?php

namespace App\Filament\App\Widgets;

use App\Models\Game;
use Filament\Widgets\Widget;

class NewGamesWidget extends Widget
{
    protected string $view = 'filament.app.widgets.new-games-widget';

    public function getGames(): array
    {
        return Game::latest()->take(5)->get()->toArray();
    }
}
