<?php

namespace App\Filament\Genshin\Resources\CharacterResource\Pages;

use App\Filament\Genshin\Resources\CharacterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateCharacter extends CreateRecord
{
    protected static string $resource = CharacterResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $id = $data['id'];

        // Define la carpeta destino
        $destinationPath = "images/characters/{$id}";

        // Mueve las imágenes cargadas temporalmente a la carpeta correcta
        if (!empty($data['card'])) {
            $filename = 'card.png';
            Storage::disk('public')->move($data['card'], "{$destinationPath}/{$filename}");
            $data['card'] = "/{$destinationPath}/{$filename}";
        }

        if (!empty($data['icon_big'])) {
            $filename = 'icon-big.png';
            Storage::disk('public')->move($data['icon_big'], "{$destinationPath}/{$filename}");
            $data['icon_big'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}
