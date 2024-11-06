<?php

namespace App\Filament\Genshin\Resources\ConsumableResource\Pages;

use App\Filament\Genshin\Resources\ConsumableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsumable extends EditRecord
{
    protected static string $resource = ConsumableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
