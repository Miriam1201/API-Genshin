<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\SkillUpgradeResource\Pages;
use App\Filament\Genshin\Resources\SkillUpgradeResource\RelationManagers;
use App\Models\SkillUpgrade;
use App\Models\SkillTalent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillUpgradeResource extends Resource
{
    protected static ?string $model = SkillUpgrade::class;

    protected static ?string $navigationGroup = 'Characters';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('skill_talent_id')
                    ->label('Skill Talent')
                    ->options(SkillTalent::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Upgrade Name')
                    ->required(),
                Forms\Components\TextInput::make('value')
                    ->label('Value'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Value')
                    ->sortable(),
                Tables\Columns\TextColumn::make('skillTalent.name')
                    ->label('Skill Talent')
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
            'index' => Pages\ListSkillUpgrades::route('/'),
            'create' => Pages\CreateSkillUpgrade::route('/create'),
            'edit' => Pages\EditSkillUpgrade::route('/{record}/edit'),
        ];
    }
}
