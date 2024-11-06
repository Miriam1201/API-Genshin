<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\EnemyArtifactResource\Pages;
use App\Filament\Genshin\Resources\EnemyArtifactResource\RelationManagers;
use App\Models\EnemyArtifact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnemyArtifactResource extends Resource
{
    protected static ?string $model = EnemyArtifact::class;

    protected static ?string $navigationGroup = 'Enemies';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('enemy_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('artifact_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('set_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rarity')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enemy_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('artifact_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('set_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rarity')
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
            'index' => Pages\ListEnemyArtifacts::route('/'),
            'create' => Pages\CreateEnemyArtifact::route('/create'),
            'edit' => Pages\EditEnemyArtifact::route('/{record}/edit'),
        ];
    }
}
