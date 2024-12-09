<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\CharacterResource\Pages;
use App\Filament\Genshin\Resources\CharacterResource\RelationManagers;
use App\Models\Character;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CharacterResource extends Resource
{
    protected static ?string $model = Character::class;

    protected static ?string $navigationGroup = 'Characters';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('Character ID')
                    ->required()
                    ->unique()
                    ->disabled(fn(?Character $record) => $record !== null),
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Title'),
                Forms\Components\TextInput::make('vision')
                    ->label('Vision'),
                Forms\Components\TextInput::make('weapon')
                    ->label('Weapon'),
                Forms\Components\TextInput::make('gender')
                    ->label('Gender'),
                Forms\Components\TextInput::make('nation')
                    ->label('Nation'),
                Forms\Components\TextInput::make('affiliation')
                    ->label('Affiliation'),
                Forms\Components\TextInput::make('rarity')
                    ->label('Rarity')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('release')
                    ->label('Release Date'),
                Forms\Components\TextInput::make('constellation')
                    ->label('Constellation'),
                Forms\Components\DatePicker::make('birthday')
                    ->label('Birthday'),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\Select::make('artifacts')
                    ->multiple()
                    ->relationship('artifacts', 'name')
                    ->preload(),

                Forms\Components\FileUpload::make('card')
                    ->label('Card Image')
                    ->image()
                    ->disk('public')
                    ->directory(fn($record) => $record ? "images/characters/{$record->id}" : null)
                    ->acceptedFileTypes(['image/png'])
                    ->imagePreviewHeight('150')
                    ->visibility('public'),
                
                Forms\Components\FileUpload::make('icon_big')
                    ->label('Icon Image')
                    ->image()
                    ->disk('public')
                    ->directory(fn($record) => $record ? "images/characters/{$record->id}" : null)
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
                    ->label('Character ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('vision')
                    ->label('Vision')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('weapon')
                    ->label('Weapon')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rarity')
                    ->label('Rarity')
                    ->sortable(),
                Tables\Columns\TextColumn::make('release')
                    ->label('Release Date')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nation')
                    ->label('Nation')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('artifacts.name')
                    ->label('Artifacts')
                    ->limit(3)
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
            'index' => Pages\ListCharacters::route('/'),
            'create' => Pages\CreateCharacter::route('/create'),
            'edit' => Pages\EditCharacter::route('/{record}/edit'),
        ];
    }
}
