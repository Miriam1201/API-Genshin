<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\ConstellationResource\Pages;
use App\Models\Constellation;
use App\Models\Character;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ConstellationResource extends Resource
{
    protected static ?string $model = Constellation::class;

    protected static ?string $navigationGroup = 'Characters';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('character_id')
                    ->relationship('character', 'name')
                    ->label('Character')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Constellation Name')
                    ->required(),
                Forms\Components\TextInput::make('unlock')
                    ->label('Unlock Requirement'),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->label('Level')
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
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('unlock')
                    ->label('Unlock Requirement')
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
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
            'index' => Pages\ListConstellations::route('/'),
            'create' => Pages\CreateConstellation::route('/create'),
            'edit' => Pages\EditConstellation::route('/{record}/edit'),
        ];
    }
}
