<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GameResource\Pages;
use App\Models\Game;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GameResource extends Resource
{
    protected static ?string $model = Game::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('home_team')
                    ->label('Home Team')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('away_team')
                    ->label('Away Team')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('poster')
                    ->directory('games')
                    ->disk('public')
                    ->image()
                    ->maxSize(2048),

                Forms\Components\DateTimePicker::make('match_at')
                    ->required(),

                Forms\Components\TextInput::make('home_score')
                    ->numeric()
                    ->label('Home Team Score'),

                Forms\Components\TextInput::make('away_score')
                    ->numeric()
                    ->label('Away Team Score'),

                Forms\Components\TextInput::make('venue')
                    ->maxLength(255),

                Forms\Components\Textarea::make('notes')
                    ->rows(4)
                    ->label('Match Notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('poster')
                    ->disk('public')
                    ->label('Poster')
                    ->height(50)
                    ->width(50)
                    ->circular(),

                Tables\Columns\TextColumn::make('home_team')
                    ->label('Home')
                    ->searchable(),

                Tables\Columns\TextColumn::make('away_team')
                    ->label('Away')
                    ->searchable(),

                Tables\Columns\TextColumn::make('match_at')
                    ->dateTime()
                    ->sortable(),

                Tables\Columns\TextColumn::make('home_score')
                    ->numeric()
                    ->sortable()
                    ->label('Home Score'),

                Tables\Columns\TextColumn::make('away_score')
                    ->numeric()
                    ->sortable()
                    ->label('Away Score'),

                Tables\Columns\TextColumn::make('venue')
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
            ->filters([])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGames::route('/'),
            'create' => Pages\CreateGame::route('/create'),
            'edit' => Pages\EditGame::route('/{record}/edit'),
        ];
    }
}
