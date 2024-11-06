<?php

namespace App\Filament\Genshin\Resources\SkillUpgradeResource\Pages;

use App\Filament\Genshin\Resources\SkillUpgradeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkillUpgrade extends EditRecord
{
    protected static string $resource = SkillUpgradeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
