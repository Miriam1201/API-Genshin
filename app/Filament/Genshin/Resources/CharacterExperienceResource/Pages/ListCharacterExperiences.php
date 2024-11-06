<?php

namespace App\Filament\Genshin\Resources\CharacterExperienceResource\Pages;

use App\Filament\Genshin\Resources\CharacterExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCharacterExperiences extends ListRecords
{
    protected static string $resource = CharacterExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
