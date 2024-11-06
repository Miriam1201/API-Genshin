<?php

namespace App\Filament\Genshin\Resources;

use App\Filament\Genshin\Resources\BossesResource\Pages;
use App\Filament\Genshin\Resources\BossesResource\RelationManagers;
use App\Models\Boss;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;



class BossesResource extends Resource
{
    protected static ?string $model = Boss::class;

    protected static ?string $navigationGroup = 'Bosses';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Boss Name')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description'),
                Forms\Components\Repeater::make('drops')
                    ->relationship('drops')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Drop Name')
                            ->required(),
                        Forms\Components\TextInput::make('rarity')
                            ->label('Rarity')
                            ->numeric()
                            ->required(),
                        Forms\Components\TextInput::make('source')
                            ->label('Source'),
                    ])
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),
                TextColumn::make('drops_count')
                    ->label('Number of Drops')
                    ->counts('drops'),
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
            'index' => Pages\ListBosses::route('/'),
            'create' => Pages\CreateBosses::route('/create'),
            'edit' => Pages\EditBosses::route('/{record}/edit'),
        ];
    }
}
