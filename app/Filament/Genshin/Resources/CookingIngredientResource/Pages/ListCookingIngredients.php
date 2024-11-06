<?php

namespace App\Filament\Genshin\Resources\CookingIngredientResource\Pages;

use App\Filament\Genshin\Resources\CookingIngredientResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCookingIngredients extends ListRecords
{
    protected static string $resource = CookingIngredientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
