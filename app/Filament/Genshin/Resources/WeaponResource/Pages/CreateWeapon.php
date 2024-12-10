<?php

namespace App\Filament\Genshin\Resources\WeaponResource\Pages;

use App\Filament\Genshin\Resources\WeaponResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateWeapon extends CreateRecord
{
    protected static string $resource = WeaponResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $id = $data['id'];

        // Define la carpeta destino
        $destinationPath = "images/weapons/{$id}";

        // Mueve las imágenes cargadas temporalmente a la carpeta correcta
        if (!empty($data['image'])) {
            $filename = 'icon.png';
            Storage::disk('public')->move($data['image'], "{$destinationPath}/{$filename}");
            $data['image'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}