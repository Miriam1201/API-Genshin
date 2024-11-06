<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\DomainRequirementResource\Pages;
use App\Filament\Genshin\Resources\DomainRequirementResource\RelationManagers;
use App\Models\DomainRequirement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DomainRequirementResource extends Resource
{
    protected static ?string $model = DomainRequirement::class;

    protected static ?string $navigationGroup = 'Domains';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('domain_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('level')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('adventure_rank')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('recommended_level')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('ley_line_disorder')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('domain_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('adventure_rank')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('recommended_level')
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
            'index' => Pages\ListDomainRequirements::route('/'),
            'create' => Pages\CreateDomainRequirement::route('/create'),
            'edit' => Pages\EditDomainRequirement::route('/{record}/edit'),
        ];
    }
}