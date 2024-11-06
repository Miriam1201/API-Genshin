<?php

namespace App\Filament\Genshin\Resources\TalentBookResource\Pages;

use App\Filament\Genshin\Resources\TalentBookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTalentBooks extends ListRecords
{
    protected static string $resource = TalentBookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
