<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\ElementalReactionResource\Pages;
use App\Filament\Genshin\Resources\ElementalReactionResource\RelationManagers;
use App\Models\ElementalReaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ElementalReactionResource extends Resource
{
    protected static ?string $model = ElementalReaction::class;

    protected static ?string $navigationGroup = 'Elements';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('element_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reaction_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('element_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reaction_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListElementalReactions::route('/'),
            'create' => Pages\CreateElementalReaction::route('/create'),
            'edit' => Pages\EditElementalReaction::route('/{record}/edit'),
        ];
    }
}
