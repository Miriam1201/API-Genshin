<?php

namespace App\Filament\Genshin\Resources\DropResource\Pages;

use App\Filament\Genshin\Resources\DropResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDrops extends ListRecords
{
    protected static string $resource = DropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
