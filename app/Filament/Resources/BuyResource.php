<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuyResource\Pages;
use App\Filament\Resources\BuyResource\RelationManagers;
use App\Models\Buy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BuyResource extends Resource
{
    protected static ?string $model = Buy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product_name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),

                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public'),

                TextColumn::make('note')
                    ->label('Note'),

                TextColumn::make('price')
                    ->label('Price')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->copyable()
                    ->searchable(),

                TextColumn::make('address')
                    ->label('Address')
                    ->copyable(),

                SelectColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'refused' => 'Refused',
                    ]),

                TextColumn::make('created_at')
                    ->label('Requested At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Filter::make('Pending')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'pending')),
                Filter::make('Accepted')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'accepted')),
                Filter::make('Refused')
                    ->query(fn (Builder $query): Builder => $query->where('status', 'refused')),
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBuys::route('/'),
//            'create' => Pages\CreateBuy::route('/create'),
//            'edit' => Pages\EditBuy::route('/{record}/edit'),
        ];
    }
}
