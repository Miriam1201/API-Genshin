<?php

namespace App\Filament\Genshin\Resources\ConstellationResource\Pages;

use App\Filament\Genshin\Resources\ConstellationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConstellations extends ListRecords
{
    protected static string $resource = ConstellationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
