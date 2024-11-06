<?php

namespace App\Filament\Genshin\Resources\DomainRewardResource\Pages;

use App\Filament\Genshin\Resources\DomainRewardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDomainRewards extends ListRecords
{
    protected static string $resource = DomainRewardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
