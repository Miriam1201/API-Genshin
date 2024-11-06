<?php

namespace App\Filament\Genshin\Resources\LocalSpecialtyResource\Pages;

use App\Filament\Genshin\Resources\LocalSpecialtyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLocalSpecialties extends ListRecords
{
    protected static string $resource = LocalSpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
