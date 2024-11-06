<?php

namespace App\Filament\Genshin\Resources\ConsumableResource\Pages;

use App\Filament\Genshin\Resources\ConsumableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsumables extends ListRecords
{
    protected static string $resource = ConsumableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
