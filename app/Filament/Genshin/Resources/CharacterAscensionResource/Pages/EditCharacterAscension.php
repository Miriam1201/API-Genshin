<?php

namespace App\Filament\Genshin\Resources\CharacterAscensionResource\Pages;

use App\Filament\Genshin\Resources\CharacterAscensionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacterAscension extends EditRecord
{
    protected static string $resource = CharacterAscensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
