<?php

namespace App\Filament\Genshin\Resources\ArtifactResource\Pages;

use App\Filament\Genshin\Resources\ArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtifact extends EditRecord
{
    protected static string $resource = ArtifactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
