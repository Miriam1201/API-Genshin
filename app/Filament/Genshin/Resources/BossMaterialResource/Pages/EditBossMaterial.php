<?php

namespace App\Filament\Genshin\Resources\BossMaterialResource\Pages;

use App\Filament\Genshin\Resources\BossMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBossMaterial extends EditRecord
{
    protected static string $resource = BossMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
