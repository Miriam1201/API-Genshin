<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\WeaponResource\Pages;
use App\Filament\Genshin\Resources\WeaponResource\RelationManagers;
use App\Models\Weapon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WeaponResource extends Resource
{
    protected static ?string $model = Weapon::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('ID')
                    ->required()
                    ->unique(ignorable: fn($record) => $record)
                    ->maxLength(100)
                    ->helperText('El ID debe ser único y no puede estar repetido.'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('rarity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('baseAttack')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('subStat')
                    ->maxLength(100),
                Forms\Components\TextInput::make('passiveName')
                    ->maxLength(100),
                Forms\Components\Textarea::make('passiveDesc')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ascensionMaterial')
                    ->maxLength(100),
                Forms\Components\FileUpload::make('image')
                    ->label('Weapon Image')
                    ->image()
                    ->disk('public')
                    ->directory(fn($record) => $record ? "images/weapons/{$record->id}" : null)
                    ->acceptedFileTypes(['image/png'])
                    ->imagePreviewHeight('150')
                    ->visibility('public'),
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
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rarity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('baseAttack')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subStat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passiveName')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ascensionMaterial')
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
            'index' => Pages\ListWeapons::route('/'),
            'create' => Pages\CreateWeapon::route('/create'),
            'edit' => Pages\EditWeapon::route('/{record}/edit'),
        ];
    }
}
