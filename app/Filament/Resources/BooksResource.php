<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BooksResource\Pages;
use App\Filament\Resources\BooksResource\RelationManagers;
use App\Models\books;
use App\Models\bookCategory;
use App\Models\scholars;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextArea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BooksResource extends Resource
{
    protected static ?string $model = books::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        // 'book_name','description','sourceFile','written_on','img','book_category_id','author'
        return $form
        
            ->schema([
                TextInput::make('book_name')->required()->label('book name'),
                Select::make('author')
                    ->label('author')
                    ->options(scholars::all()->pluck('fname', 'id'))
                    ->searchable()->required(),
                Select::make('book_category_id')
                    ->label('category')
                    ->options(bookCategory::all()->pluck('name', 'id'))
                    ->searchable(),
                DatePicker::make('written_on')->required()->label('written on'),
                FileUpload::make('sourceFile')->required()->label('source file'),
                FileUpload::make('img')->label('book image'),
                TextArea::make('description')->required()->label('book name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('book_name')->sortable()->searchable(),
                TextColumn::make('AuthorName.fname')->sortable()->searchable(),
                // TextColumn::make('description')->limit(10)->sortable()->searchable(),
                TextColumn::make('booksCategory.name')->sortable()->searchable(),
                TextColumn::make('img')->sortable()->searchable(),
                TextColumn::make('written_on')->sortable()->searchable(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBooks::route('/create'),
            'edit' => Pages\EditBooks::route('/{record}/edit'),
        ];
    }    
}
