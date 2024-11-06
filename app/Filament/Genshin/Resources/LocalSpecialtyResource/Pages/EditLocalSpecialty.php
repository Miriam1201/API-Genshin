<?php

namespace App\Filament\Genshin\Resources\LocalSpecialtyResource\Pages;

use App\Filament\Genshin\Resources\LocalSpecialtyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLocalSpecialty extends EditRecord
{
    protected static string $resource = LocalSpecialtyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
