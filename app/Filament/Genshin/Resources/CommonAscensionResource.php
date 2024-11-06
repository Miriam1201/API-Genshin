<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\CommonAscensionResource\Pages;
use App\Filament\Genshin\Resources\CommonAscensionResource\RelationManagers;
use App\Models\CommonAscension;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommonAscensionResource extends Resource
{
    protected static ?string $model = CommonAscension::class;

    protected static ?string $navigationGroup = 'Materials';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('characters')
                    ->required(),
                Forms\Components\TextInput::make('weapons')
                    ->required(),
                Forms\Components\TextInput::make('items')
                    ->required(),
                Forms\Components\TextInput::make('sources')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
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
            'index' => Pages\ListCommonAscensions::route('/'),
            'create' => Pages\CreateCommonAscension::route('/create'),
            'edit' => Pages\EditCommonAscension::route('/{record}/edit'),
        ];
    }
}
