<?php

namespace App\Filament\Genshin\Resources\CraftingRequirementResource\Pages;

use App\Filament\Genshin\Resources\CraftingRequirementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCraftingRequirements extends ListRecords
{
    protected static string $resource = CraftingRequirementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
