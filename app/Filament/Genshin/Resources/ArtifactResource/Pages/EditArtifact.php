<?php

namespace App\Filament\Genshin\Resources\ArtifactResource\Pages;

use App\Filament\Genshin\Resources\ArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditArtifact extends EditRecord
{
    protected static string $resource = ArtifactResource::class;

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
        $destinationPath = "images/artifacts/{$id}";

        // Mueve la imagen cargada temporalmente a la carpeta correcta
        if (!empty($data['image_path']) && $data['image_path'] !== $this->record->image_path) {
            $filename = 'artifact.png';
            Storage::disk('public')->move($data['image_path'], "{$destinationPath}/{$filename}");
            $data['image_path'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}
