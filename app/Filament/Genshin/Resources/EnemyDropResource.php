<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\EnemyDropResource\Pages;
use App\Filament\Genshin\Resources\EnemyDropResource\RelationManagers;
use App\Models\EnemyDrop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnemyDropResource extends Resource
{
    protected static ?string $model = EnemyDrop::class;

    protected static ?string $navigationGroup = 'Enemies';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('enemy_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('drop_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rarity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('minimum_level')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enemy_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('drop_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rarity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('minimum_level')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListEnemyDrops::route('/'),
            'create' => Pages\CreateEnemyDrop::route('/create'),
            'edit' => Pages\EditEnemyDrop::route('/{record}/edit'),
        ];
    }
}
