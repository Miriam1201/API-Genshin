<?php

namespace App\Filament\Genshin\Resources\NationResource\Pages;

use App\Filament\Genshin\Resources\NationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNations extends ListRecords
{
    protected static string $resource = NationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
