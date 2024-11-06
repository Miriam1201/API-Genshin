<?php

namespace App\Filament\Genshin\Resources\EnemyArtifactResource\Pages;

use App\Filament\Genshin\Resources\EnemyArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnemyArtifact extends EditRecord
{
    protected static string $resource = EnemyArtifactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
