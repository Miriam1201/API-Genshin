<?php

namespace App\Filament\Genshin\Resources\WeaponAscensionResource\Pages;

use App\Filament\Genshin\Resources\WeaponAscensionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeaponAscensions extends ListRecords
{
    protected static string $resource = WeaponAscensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
