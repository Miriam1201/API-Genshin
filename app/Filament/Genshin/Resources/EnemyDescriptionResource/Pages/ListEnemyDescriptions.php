<?php

namespace App\Filament\Genshin\Resources\EnemyDescriptionResource\Pages;

use App\Filament\Genshin\Resources\EnemyDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnemyDescriptions extends ListRecords
{
    protected static string $resource = EnemyDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
