<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\AscensionMaterialResource\Pages;
use App\Filament\Genshin\Resources\AscensionMaterialResource\RelationManagers;
use App\Models\AscensionMaterial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AscensionMaterialResource extends Resource
{
    protected static ?string $model = AscensionMaterial::class;

    protected static ?string $navigationGroup = 'Characters';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('character_id')
                    ->label('Character')
                    ->relationship('character', 'name')
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->label('Ascension Level')
                    ->required(),
                Forms\Components\TextInput::make('material_name')
                    ->label('Material Name')
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->label('Quantity')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('character.name')
                    ->label('Character')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Ascension Level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('material_name')
                    ->label('Material Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Quantity')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAscensionMaterials::route('/'),
            'create' => Pages\CreateAscensionMaterial::route('/create'),
            'edit' => Pages\EditAscensionMaterial::route('/{record}/edit'),
        ];
    }
}
