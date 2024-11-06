<?php

namespace App\Filament\Genshin\Resources\EnemyDropResource\Pages;

use App\Filament\Genshin\Resources\EnemyDropResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnemyDrops extends ListRecords
{
    protected static string $resource = EnemyDropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
