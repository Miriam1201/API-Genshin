<?php

namespace App\Filament\Genshin\Resources\CharacterResource\Pages;

use App\Filament\Genshin\Resources\CharacterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCharacter extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
