<?php

namespace App\Filament\Genshin\Resources\WeaponAscensionResource\Pages;

use App\Filament\Genshin\Resources\WeaponAscensionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeaponAscension extends EditRecord
{
    protected static string $resource = WeaponAscensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
