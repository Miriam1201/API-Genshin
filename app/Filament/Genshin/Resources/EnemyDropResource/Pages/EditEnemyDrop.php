<?php

namespace App\Filament\Genshin\Resources\EnemyDropResource\Pages;

use App\Filament\Genshin\Resources\EnemyDropResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnemyDrop extends EditRecord
{
    protected static string $resource = EnemyDropResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
