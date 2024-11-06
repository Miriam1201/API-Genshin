<?php

namespace App\Filament\Genshin\Resources\EnemyResource\Pages;

use App\Filament\Genshin\Resources\EnemyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEnemy extends EditRecord
{
    protected static string $resource = EnemyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
