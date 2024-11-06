<?php

namespace App\Filament\Genshin\Resources\ReactionElementResource\Pages;

use App\Filament\Genshin\Resources\ReactionElementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReactionElement extends EditRecord
{
    protected static string $resource = ReactionElementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
