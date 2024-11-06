<?php

namespace App\Filament\Genshin\Resources\EnemyArtifactResource\Pages;

use App\Filament\Genshin\Resources\EnemyArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnemyArtifacts extends ListRecords
{
    protected static string $resource = EnemyArtifactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
