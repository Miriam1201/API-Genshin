<?php

namespace App\Filament\Genshin\Resources\BossArtifactResource\Pages;

use App\Filament\Genshin\Resources\BossArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBossArtifact extends EditRecord
{
    protected static string $resource = BossArtifactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
