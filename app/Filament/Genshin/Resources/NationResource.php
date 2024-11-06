<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\NationResource\Pages;
use App\Filament\Genshin\Resources\NationResource\RelationManagers;
use App\Models\Nation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NationResource extends Resource
{
    protected static ?string $model = Nation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('element')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('archon')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('controlling_entity')
                    ->required()
                    ->maxLength(100),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('element')
                    ->searchable(),
                Tables\Columns\TextColumn::make('archon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('controlling_entity')
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
            'index' => Pages\ListNations::route('/'),
            'create' => Pages\CreateNation::route('/create'),
            'edit' => Pages\EditNation::route('/{record}/edit'),
        ];
    }
}
