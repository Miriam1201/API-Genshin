<?php

namespace App\Filament\Genshin\Resources\EnemyElementResource\Pages;

use App\Filament\Genshin\Resources\EnemyElementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnemyElement extends EditRecord
{
    protected static string $resource = EnemyElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
