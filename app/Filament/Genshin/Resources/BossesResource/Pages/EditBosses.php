<?php

namespace App\Filament\Genshin\Resources\BossesResource\Pages;

use App\Filament\Genshin\Resources\BossesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBosses extends EditRecord
{
    protected static string $resource = BossesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
