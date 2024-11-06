<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\PasiveTalentResource\Pages;
use App\Filament\Genshin\Resources\PasiveTalentResource\RelationManagers;
use App\Models\PassiveTalent;
use App\Models\Character;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasiveTalentResource extends Resource
{
    protected static ?string $model = PassiveTalent::class;

    protected static ?string $navigationGroup = 'Characters';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('character_id')
                    ->label('Character')
                    ->options(Character::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Talent Name')
                    ->required(),
                Forms\Components\TextInput::make('unlock')
                    ->label('Unlock Condition'),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->label('Level')
                    ->numeric(),
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
                    ->label('Unlock')
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->label('Level')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
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
            'index' => Pages\ListPasiveTalent::route('/'),
            'create' => Pages\CreatePasiveTalent::route('/create'),
            'edit' => Pages\EditPasiveTalent::route('/{record}/edit'),
        ];
    }
}
