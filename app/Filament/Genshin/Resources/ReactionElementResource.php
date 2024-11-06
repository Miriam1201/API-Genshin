<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\ReactionElementResource\Pages;
use App\Filament\Genshin\Resources\ReactionElementResource\RelationManagers;
use App\Models\ReactionElement;
use App\Models\ElementalReaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReactionElementResource extends Resource
{
    protected static ?string $model = ReactionElement::class;

    protected static ?string $navigationGroup = 'Elements';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('reaction_id')
                    ->label('Elemental Reaction')
                    ->options(ElementalReaction::all()->pluck('reaction_name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('element_name')
                    ->label('Element Name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reaction.reaction_name')
                    ->label('Elemental Reaction')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('element_name')
                    ->label('Element Name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReactionElements::route('/'),
            'create' => Pages\CreateReactionElement::route('/create'),
            'edit' => Pages\EditReactionElement::route('/{record}/edit'),
        ];
    }
}
