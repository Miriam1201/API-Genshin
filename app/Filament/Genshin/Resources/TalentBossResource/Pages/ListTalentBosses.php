<?php

namespace App\Filament\Genshin\Resources\TalentBossResource\Pages;

use App\Filament\Genshin\Resources\TalentBossResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTalentBosses extends ListRecords
{
    protected static string $resource = TalentBossResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
