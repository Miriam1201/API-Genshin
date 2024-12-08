<?php

namespace App\Filament\Genshin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Character;

class CharacterNationStats extends ChartWidget
{
    protected static ?string $heading = 'Statistics by Nation';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Quantity per Nation',
                    'data' => Character::query()
                        ->selectRaw('nation, COUNT(*) as count')
                        ->groupBy('nation')
                        ->pluck('count')
                        ->toArray(),
                ],
            ],
            'labels' => Character::query()
                ->selectRaw('nation')
                ->groupBy('nation')
                ->pluck('nation')
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
