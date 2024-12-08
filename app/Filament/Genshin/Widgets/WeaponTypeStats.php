<?php

namespace App\Filament\Genshin\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Weapon;

class WeaponTypeStats extends ChartWidget
{
    protected static ?string $heading = 'Statistics of weapons by Weapon Type';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Quantity of weapons by Weapon Type',
                    'data' => Weapon::query()
                        ->selectRaw('type, COUNT(*) as count')
                        ->groupBy('type')
                        ->pluck('count')
                        ->toArray(),
                ],
            ],
            'labels' => Weapon::query()
                ->selectRaw('type')
                ->groupBy('type')
                ->pluck('type')
                ->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
