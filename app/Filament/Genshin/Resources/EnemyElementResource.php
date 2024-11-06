<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\EnemyElementResource\Pages;
use App\Filament\Genshin\Resources\EnemyElementResource\RelationManagers;
use App\Models\EnemyElement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnemyElementResource extends Resource
{
    protected static ?string $model = EnemyElement::class;

    protected static ?string $navigationGroup = 'Enemies';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('enemy_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('element')
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
                Tables\Columns\TextColumn::make('element')
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
            'index' => Pages\ListEnemyElements::route('/'),
            'create' => Pages\CreateEnemyElement::route('/create'),
            'edit' => Pages\EditEnemyElement::route('/{record}/edit'),
        ];
    }
}
