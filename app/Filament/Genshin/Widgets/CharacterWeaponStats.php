<?php

namespace App\Filament\Genshin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Character;

class CharacterWeaponStats extends ChartWidget
{
    protected static ?string $heading = 'Statistics of character by Weapon Type';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Quantity of character by Weapon Type',
                    'data' => Character::query()
                        ->selectRaw('weapon, COUNT(*) as count')
                        ->groupBy('weapon')
                        ->pluck('count')
                        ->toArray(),
                ],
            ],
            'labels' => Character::query()
                ->selectRaw('weapon')
                ->groupBy('weapon')
                ->pluck('weapon')
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
