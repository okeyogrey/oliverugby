<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Models\Player;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Team Management'; // Group it nicely

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(255),
            Forms\Components\TextInput::make('jersey_number') // 👈 ADD THIS
                ->numeric()
                ->minValue(1)
                ->maxValue(99)
                ->required(),
            Forms\Components\FileUpload::make('photo')
                ->directory('players')
                ->image()
                ->imagePreviewHeight('150')
                ->required(),
            Forms\Components\TextInput::make('position')->required()->maxLength(100),
            Forms\Components\TextInput::make('age')->numeric()->nullable(),
            Forms\Components\TextInput::make('height')->nullable(),
            Forms\Components\TextInput::make('weight')->nullable(),
            Forms\Components\Select::make('team')
                ->options([
                    'current' => 'Current',
                    'past' => 'Past',
                ])
                ->default('current')
                ->required(),
            Forms\Components\TextInput::make('games_played')->numeric()->default(0),
            Forms\Components\TextInput::make('tries_scored')->numeric()->default(0),
            Forms\Components\TextInput::make('tackles')->numeric()->default(0),
            Forms\Components\Textarea::make('bio')->rows(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\ImageColumn::make('photo')->circular(),
            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('jersey_number'), // 👈 SHOW IN LIST
            Tables\Columns\TextColumn::make('position')->sortable(),
            Tables\Columns\BadgeColumn::make('team')
                ->colors([
                    'success' => 'current',
                    'secondary' => 'past',
                ]),
            Tables\Columns\TextColumn::make('games_played')->sortable(),
            Tables\Columns\TextColumn::make('tries_scored')->sortable(),
            Tables\Columns\TextColumn::make('tackles')->sortable(),
            Tables\Columns\TextColumn::make('created_at')->date(),
        ])->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
