<?php

namespace App\Filament\Genshin\Resources\CommonAscensionResource\Pages;

use App\Filament\Genshin\Resources\CommonAscensionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommonAscensions extends ListRecords
{
    protected static string $resource = CommonAscensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
