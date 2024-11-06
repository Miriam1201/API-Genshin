<?php

namespace App\Filament\Genshin\Resources\PasiveTalentResource\Pages;

use App\Filament\Genshin\Resources\PasiveTalentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPasiveTalent extends ListRecords
{
    protected static string $resource = PasiveTalentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
