<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\TeamResource\Pages;
use App\Filament\Genshin\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('Team ID')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->disabled(fn(?Team $record) => $record !== null),

                Forms\Components\Select::make('main_dps')
                    ->label('Main DPS')
                    ->relationship('characters', 'name')
                    ->required(),

                Forms\Components\Select::make('sub_dps')
                    ->label('Sub DPS')
                    ->relationship('characters', 'name')
                    ->required(),

                Forms\Components\Select::make('support')
                    ->label('Support')
                    ->relationship('characters', 'name')
                    ->required(),

                Forms\Components\Select::make('healer_shielder')
                    ->label('Healer / Shielder')
                    ->relationship('characters', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Team ID')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('main_dps')
                    ->label('Main DPS')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('sub_dps')
                    ->label('Sub DPS')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('support')
                    ->label('Support')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('healer_shielder')
                    ->label('Healer / Shielder')
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}