<?php

namespace App\Filament\Genshin\Resources\DomainRequirementResource\Pages;

use App\Filament\Genshin\Resources\DomainRequirementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDomainRequirements extends ListRecords
{
    protected static string $resource = DomainRequirementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
