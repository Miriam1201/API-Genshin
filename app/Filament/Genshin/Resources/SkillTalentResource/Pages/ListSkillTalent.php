<?php

namespace App\Filament\Genshin\Resources\SkillTalentResource\Pages;

use App\Filament\Genshin\Resources\SkillTalentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkillTalent extends ListRecords
{
    protected static string $resource = SkillTalentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
