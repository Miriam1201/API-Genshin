<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\EnemyDescriptionResource\Pages;
use App\Filament\Genshin\Resources\EnemyDescriptionResource\RelationManagers;
use App\Models\EnemyDescription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnemyDescriptionResource extends Resource
{
    protected static ?string $model = EnemyDescription::class;

    protected static ?string $navigationGroup = 'Enemies';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('enemy_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description_name')
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
                Tables\Columns\TextColumn::make('enemy_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description_name')
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
            'index' => Pages\ListEnemyDescriptions::route('/'),
            'create' => Pages\CreateEnemyDescription::route('/create'),
            'edit' => Pages\EditEnemyDescription::route('/{record}/edit'),
        ];
    }
}
