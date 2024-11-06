<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\BossArtifactResource\Pages;
use App\Filament\Genshin\Resources\BossArtifactResource\RelationManagers;
use App\Models\BossArtifact;
use App\Models\Boss;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BossArtifactResource extends Resource
{
    protected static ?string $model = BossArtifact::class;

    protected static ?string $navigationGroup = 'Bosses';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('boss_id')
                    ->label('Boss')
                    ->options(Boss::all()->pluck('name', 'id'))
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Artifact Name')
                    ->required(),
                Forms\Components\TextInput::make('max_rarity')
                    ->label('Max Rarity')
                    ->numeric()
                    ->required(),
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
                Tables\Columns\TextColumn::make('max_rarity')
                    ->label('Max Rarity')
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
            'index' => Pages\ListBossArtifacts::route('/'),
            'create' => Pages\CreateBossArtifact::route('/create'),
            'edit' => Pages\EditBossArtifact::route('/{record}/edit'),
        ];
    }
}
