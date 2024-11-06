<?php

namespace App\Filament\Genshin\Resources\SkillUpgradeResource\Pages;

use App\Filament\Genshin\Resources\SkillUpgradeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillUpgrades extends ListRecords
{
    protected static string $resource = SkillUpgradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
