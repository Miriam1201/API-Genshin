<?php

namespace App\Filament\Genshin\Resources\ArtifactResource\Pages;


use App\Filament\Genshin\Resources\ArtifactResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArtifacts extends ListRecords
{
    protected static string $resource = ArtifactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
