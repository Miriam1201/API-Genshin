<?php

namespace App\Filament\Genshin\Resources\WeaponExperienceResource\Pages;

use App\Filament\Genshin\Resources\WeaponExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeaponExperiences extends ListRecords
{
    protected static string $resource = WeaponExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
