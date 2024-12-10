<?php

namespace App\Filament\Genshin\Resources\ArtifactResource\Pages;

use App\Filament\Genshin\Resources\ArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateArtifact extends CreateRecord
{
    protected static string $resource = ArtifactResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $id = $data['id'];

        // Define la carpeta destino
        $destinationPath = "images/artifacts/{$id}";

        // Mueve la imagen cargada temporalmente a la carpeta correcta
        if (!empty($data['image_path'])) {
            $filename = 'artifact.png';
            Storage::disk('public')->move($data['image_path'], "{$destinationPath}/{$filename}");
            $data['image_path'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}
