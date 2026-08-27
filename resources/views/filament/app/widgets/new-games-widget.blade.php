<x-filament-widgets::widget>
    <x-filament::section>
        <h2>Latest games</h2>
        <ul class="list-disc list-inside">
            @foreach($this->getGames() as $game)
                <li>{{ $game['title'] }}</li>
            @endforeach
        </ul>
    </x-filament::section>
</x-filament-widgets::widget>
