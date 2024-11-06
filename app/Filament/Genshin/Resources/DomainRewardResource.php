<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\DomainRewardResource\Pages;
use App\Filament\Genshin\Resources\DomainRewardResource\RelationManagers;
use App\Models\DomainReward;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DomainRewardResource extends Resource
{
    protected static ?string $model = DomainReward::class;

    protected static ?string $navigationGroup = 'Domains';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('domain_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('day')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('level')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('adventure_experience')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('companionship_experience')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mora')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('item_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('drop_min')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('drop_max')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('domain_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('day')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('adventure_experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('companionship_experience')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mora')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('item_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('drop_min')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('drop_max')
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
            'index' => Pages\ListDomainRewards::route('/'),
            'create' => Pages\CreateDomainReward::route('/create'),
            'edit' => Pages\EditDomainReward::route('/{record}/edit'),
        ];
    }
}
