<?php

namespace App\Filament\Genshin\Resources\WeaponExperienceResource\Pages;

use App\Filament\Genshin\Resources\WeaponExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeaponExperience extends EditRecord
{
    protected static string $resource = WeaponExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
