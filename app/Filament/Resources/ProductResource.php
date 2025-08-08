<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\CategoryProducts;
use App\Models\Product;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome do produto')
                    ->required(),


                TextInput::make('price')
                    ->label('Preço')
                    ->integer()
                    ->suffix('Kz')
                    ->required(),

                Select::make('category_id')
                    ->options(CategoryProducts::all()->pluck('name', 'id'))
                    ->label('Categoria de Produto')
                    ->required()
                    // ->multiple()
                    ->searchable()
                    ->preload(),

                Select::make('type')
                    ->options([
                        'physical' => 'Físico',
                        'digital' => 'Digital',
                    ])
                    ->label('Tipo de Produto')
                    ->required(),

                ColorPicker::make('color')
                    ->label('Cor do Produto'),

                Select::make('size')
                    ->label('Tamanho do Produto')
                    ->options([
                        'XS',
                        'S',
                        'M',
                        'L',
                        'XL',
                    ])
                    ->label('Tipo de Produto')
                    ->required(),

                TextInput::make('weight')
                    ->label('Peso do Produto (em gramas)')
                    ->suffix('g')
                    ->numeric()
                    ->default(0)
                    ->required(),

                RichEditor::make('description')
                    ->label('Descrição do Produto')
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome do Produto'),

                TextColumn::make('price')
                    ->label('Preço'),


                TextColumn::make('type')
                    ->label('Tipo do Produto')
                    ->badge(),


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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
