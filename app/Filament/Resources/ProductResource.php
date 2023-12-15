<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name_en')
                    ->label('Name (English)')
                    ->required(),

                TextInput::make('name_ar')
                    ->label('Name (Arabic)')
                    ->required(),

                RichEditor::make('description_en')
                    ->label('Description (English)'),

                RichEditor::make('description_ar')
                    ->label('Description (Arabic)'),

                TextInput::make('price')
                    ->label('Price')
                    ->required(),

                TextInput::make('discount_price')
                    ->label('Discount Price')
                    ->nullable(),

                TextInput::make('in_stock')
                    ->label('In Stock'),

                TextInput::make('for_rent')
                    ->label('For Rent'),

                Select::make('category')
                    ->label('Category')
                    ->required()
                    ->options([
                        'Cameras' => 'Cameras',
                        'Lenses' => 'Lenses',
                        'Cleaners' => 'Cleaners',
                        'Mikes' => 'Mikes',
                        'Accessories' => 'Accessories',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_en')
                    ->label('Name (English)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name_ar')
                    ->label('Name (Arabic)')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description_en')
                    ->label('Description (English)'),

                TextColumn::make('description_ar')
                    ->label('Description (Arabic)'),

                TextColumn::make('price')
                    ->label('Price')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('discount_price')
                    ->label('Discount Price')
                    ->numeric()
                    ->sortable(),

                ToggleColumn::make('in_stock')
                    ->label('In Stock')
                    ->sortable(),

                ToggleColumn::make('for_rent')
                    ->label('For Rent')
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Category')
                    ->sortable()
            ])
            ->filters([
                Filter::make('for_rent')
                    ->query(fn (Builder $query): Builder => $query->where('for_rent', true)),
                Filter::make('in_stock')
                    ->query(fn (Builder $query): Builder => $query->where('in_stock', true))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
