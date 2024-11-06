<?php

namespace App\Filament\Genshin\Resources\CharacterResource\Pages;

use App\Filament\Genshin\Resources\CharacterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCharacter extends CreateRecord
{
    protected static string $resource = CharacterResource::class;
}
