<?php

namespace App\Filament\Genshin\Resources\ElementalReactionResource\Pages;

use App\Filament\Genshin\Resources\ElementalReactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListElementalReactions extends ListRecords
{
    protected static string $resource = ElementalReactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
