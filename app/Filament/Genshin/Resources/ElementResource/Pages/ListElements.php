<?php

namespace App\Filament\Genshin\Resources\ElementResource\Pages;

use App\Filament\Genshin\Resources\ElementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListElements extends ListRecords
{
    protected static string $resource = ElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
