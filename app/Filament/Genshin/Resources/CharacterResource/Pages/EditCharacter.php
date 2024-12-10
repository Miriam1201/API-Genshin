<?php

namespace App\Filament\Genshin\Resources\CharacterResource\Pages;

use App\Filament\Genshin\Resources\CharacterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditCharacter extends EditRecord
{
    protected static string $resource = CharacterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $id = $this->record->id;

        // Define la carpeta destino
        $destinationPath = "images/characters/{$id}";

        // Mueve las imágenes cargadas temporalmente a la carpeta correcta
        if (!empty($data['card']) && $data['card'] !== $this->record->card) {
            $filename = 'card.png';
            Storage::disk('public')->move($data['card'], "{$destinationPath}/{$filename}");
            $data['card'] = "/{$destinationPath}/{$filename}";
        }

        if (!empty($data['icon_big']) && $data['icon_big'] !== $this->record->icon_big) {
            $filename = 'icon-big.png';
            Storage::disk('public')->move($data['icon_big'], "{$destinationPath}/{$filename}");
            $data['icon_big'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}
