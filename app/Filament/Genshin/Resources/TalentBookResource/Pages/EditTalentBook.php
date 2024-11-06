<?php

namespace App\Filament\Genshin\Resources\TalentBookResource\Pages;

use App\Filament\Genshin\Resources\TalentBookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTalentBook extends EditRecord
{
    protected static string $resource = TalentBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
