<?php

namespace App\Filament\Genshin\Resources\MaterialsResource\Pages;

use App\Filament\Genshin\Resources\MaterialsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaterials extends EditRecord
{
    protected static string $resource = MaterialsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
