<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\DropResource\Pages;
use App\Filament\Genshin\Resources\DropResource\RelationManagers;
use App\Models\Drop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;


class DropResource extends Resource
{
    protected static ?string $model = Drop::class;

    protected static ?string $navigationGroup = 'Bosses';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('boss_id')
                    ->relationship('boss', 'name')
                    ->label('Boss')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Drop Name')
                    ->required(),
                Forms\Components\TextInput::make('rarity')
                    ->label('Rarity')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('source')
                    ->label('Source'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('boss_id')
                    ->label('Boss ID')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('rarity')
                    ->label('Rarity')
                    ->sortable(),

                Tables\Columns\TextColumn::make('source')
                    ->label('Source')
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
            'index' => Pages\ListDrops::route('/'),
            'create' => Pages\CreateDrop::route('/create'),
            'edit' => Pages\EditDrop::route('/{record}/edit'),
        ];
    }
}
