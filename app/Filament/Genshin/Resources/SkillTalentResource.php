<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\SkillTalentResource\Pages;
use App\Filament\Genshin\Resources\SkillTalentResource\RelationManagers;
use App\Models\SkillTalent;
use App\Models\Character;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillTalentResource extends Resource
{
    protected static ?string $model = SkillTalent::class;

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
                    ->label('Skill Talent Name')
                    ->required(),
                Forms\Components\TextInput::make('unlock')
                    ->label('Unlock Requirement'),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('type')
                    ->label('Type')
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
                    ->searchable()
                    ->formatStateUsing(fn($state) => $state ? $state : 'N/A'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('unlock')
                    ->label('Unlock Requirement')
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
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
            'index' => Pages\ListSkillTalent::route('/'),
            'create' => Pages\CreateSkillTalent::route('/create'),
            'edit' => Pages\EditSkillTalent::route('/{record}/edit'),
        ];
    }
}
