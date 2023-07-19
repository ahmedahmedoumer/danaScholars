<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookCategoryResource\Pages;
use App\Filament\Resources\BookCategoryResource\RelationManagers;
use App\Models\BookCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookCategoryResource extends Resource
{
    protected static ?string $model = BookCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                //
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListBookCategories::route('/'),
            'create' => Pages\CreateBookCategory::route('/create'),
            'edit' => Pages\EditBookCategory::route('/{record}/edit'),
        ];
    }    
}
