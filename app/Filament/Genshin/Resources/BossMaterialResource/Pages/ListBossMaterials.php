<?php

namespace App\Filament\Genshin\Resources\BossMaterialResource\Pages;

use App\Filament\Genshin\Resources\BossMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBossMaterials extends ListRecords
{
    protected static string $resource = BossMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
