<?php

namespace App\Filament\Genshin\Resources\AscensionMaterialResource\Pages;

use App\Filament\Genshin\Resources\AscensionMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAscensionMaterials extends ListRecords
{
    protected static string $resource = AscensionMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
