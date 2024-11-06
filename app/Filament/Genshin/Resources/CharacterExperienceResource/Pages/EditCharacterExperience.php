<?php

namespace App\Filament\Genshin\Resources\CharacterExperienceResource\Pages;

use App\Filament\Genshin\Resources\CharacterExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacterExperience extends EditRecord
{
    protected static string $resource = CharacterExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
