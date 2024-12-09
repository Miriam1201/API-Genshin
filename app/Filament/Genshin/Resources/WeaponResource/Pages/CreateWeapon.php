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
        $name = $data['name'];

        // Define la carpeta destino
        $destinationPath = "images/weapons/{$name}";

        // Mueve la imagen cargada temporalmente a la carpeta correcta
        if (!empty($data['icon'])) {
            $filename = 'icon.png';
            Storage::disk('public')->move($data['icon'], "{$destinationPath}/{$filename}");
            $data['icon'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}
