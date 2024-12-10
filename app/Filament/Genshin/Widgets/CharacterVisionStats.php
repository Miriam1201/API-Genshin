<?php

namespace App\Filament\Genshin\Widgets;

use App\Models\Character;
use Filament\Widgets\ChartWidget;

class CharacterVisionStats extends ChartWidget
{
    protected static ?string $heading = 'Statistics by Element';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Quantity per Element',
                    'data' => Character::query()
                        ->selectRaw('vision, COUNT(*) as count')
                        ->groupBy('vision')
                        ->pluck('count')
                        ->toArray(),
                ],
            ],
            'labels' => Character::query()
                ->selectRaw('vision')
                ->groupBy('vision')
                ->pluck('vision')
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
