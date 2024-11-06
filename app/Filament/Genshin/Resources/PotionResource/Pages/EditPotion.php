<?php

namespace App\Filament\Genshin\Resources\PotionResource\Pages;

use App\Filament\Genshin\Resources\PotionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPotion extends EditRecord
{
    protected static string $resource = PotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
