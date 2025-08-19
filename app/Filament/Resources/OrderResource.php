<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;   
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Shop';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('customer_name')->required(),
            Forms\Components\TextInput::make('phone_number')->tel()->required(),
            Forms\Components\TextInput::make('location')->required(),
            Forms\Components\Select::make('product_id')
                ->relationship('product', 'title')
                ->required(),
            Forms\Components\TextInput::make('quantity')->numeric()->default(1),
            Forms\Components\TextInput::make('mpesa_number')->required(),
            Forms\Components\TextInput::make('mpesa_code')->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'pending' => 'Pending',
                    'confirmed' => 'Confirmed',
                    'shipped' => 'Shipped',
                    'delivered' => 'Delivered',
                ])
                ->default('pending'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('customer_name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('phone_number'),
            Tables\Columns\TextColumn::make('product.title')->label('Product'),
            Tables\Columns\TextColumn::make('quantity'),
            Tables\Columns\TextColumn::make('mpesa_number'),
            Tables\Columns\TextColumn::make('mpesa_code'),
            Tables\Columns\BadgeColumn::make('status')
                ->colors([
                    'warning' => 'pending',
                    'info' => 'confirmed',
                    'primary' => 'shipped',
                    'success' => 'delivered',
                ]),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ])->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
