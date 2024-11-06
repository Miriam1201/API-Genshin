<?php

namespace App\Filament\Genshin\Resources\AscensionMaterialResource\Pages;

use App\Filament\Genshin\Resources\AscensionMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAscensionMaterial extends EditRecord
{
    protected static string $resource = AscensionMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
