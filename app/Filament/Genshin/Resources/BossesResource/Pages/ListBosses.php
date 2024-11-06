<?php

namespace App\Filament\Genshin\Resources\BossesResource\Pages;

use App\Filament\Genshin\Resources\BossesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBosses extends ListRecords
{
    protected static string $resource = BossesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
