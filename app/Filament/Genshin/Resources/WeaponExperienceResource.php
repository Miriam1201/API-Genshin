<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\WeaponExperienceResource\Pages;
use App\Filament\Genshin\Resources\WeaponExperienceResource\RelationManagers;
use App\Models\WeaponExperience;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeaponExperienceResource extends Resource
{
    protected static ?string $model = WeaponExperience::class;

    protected static ?string $navigationGroup = 'Materials';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('experience')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('rarity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('source')
                    ->required(),
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
                Tables\Columns\TextColumn::make('experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rarity')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListWeaponExperiences::route('/'),
            'create' => Pages\CreateWeaponExperience::route('/create'),
            'edit' => Pages\EditWeaponExperience::route('/{record}/edit'),
        ];
    }
}
