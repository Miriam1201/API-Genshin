<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\ArtifactResource\Pages;
use App\Filament\Genshin\Resources\ArtifactResource\RelationManagers;
use App\Models\Artifact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtifactResource extends Resource
{
    protected static ?string $model = Artifact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('ID')
                    ->required()
                    ->unique(ignorable: fn($record) => $record),

                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),

                Forms\Components\TextInput::make('max_rarity')
                    ->label('Max Rarity')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('2_piece_bonus')
                    ->label('2-Piece Bonus'),

                Forms\Components\Textarea::make('4_piece_bonus')
                    ->label('4-Piece Bonus'),

                Forms\Components\Select::make('characters')
                    ->multiple()
                    ->relationship('characters', 'name')
                    ->preload(),

                Forms\Components\FileUpload::make('image_path')
                    ->label('Artifact Image')
                    ->image()
                    ->disk('public')
                    ->directory(fn($record) => $record ? "images/artifacts/{$record->id}" : null)
                    ->acceptedFileTypes(['image/png'])
                    ->imagePreviewHeight('150')
                    ->visibility('public'),
                
                
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

                Tables\Columns\TextColumn::make('max_rarity')
                    ->label('Max Rarity')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('2_piece_bonus')
                    ->label('2-Piece Bonus')
                    ->limit(50),

                Tables\Columns\TextColumn::make('4_piece_bonus')
                    ->label('4-Piece Bonus')
                    ->limit(50),

                Tables\Columns\TextColumn::make('characters.name')
                    ->label('Characters')
                    ->limit(3)
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->disk('public')
                    ->height('50px')
                    ->width('50px'),

            ])
            ->filters([])
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
            'index' => Pages\ListArtifacts::route('/'),
            'create' => Pages\CreateArtifact::route('/create'),
            'edit' => Pages\EditArtifact::route('/{record}/edit'),
        ];
    }
}
