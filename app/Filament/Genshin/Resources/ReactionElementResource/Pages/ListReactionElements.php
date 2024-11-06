<?php

namespace App\Filament\Genshin\Resources\ReactionElementResource\Pages;

use App\Filament\Genshin\Resources\ReactionElementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReactionElements extends ListRecords
{
    protected static string $resource = ReactionElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
