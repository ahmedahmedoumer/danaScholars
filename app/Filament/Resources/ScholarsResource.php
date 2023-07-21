<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScholarsResource\Pages;
use App\Filament\Resources\ScholarsResource\RelationManagers;
use App\Models\scholars;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScholarsResource extends Resource
{
    protected static ?string $model = scholars::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('fname')->label('first name')->required(),
                TextInput::make('lname')->label('last name')->required(),
                TextInput::make('mothers_name')->required(),
                TextInput::make('birth_place')->required(),
                TextInput::make('family')->required(),
                TextInput::make('children')->required(),
                TextInput::make('founder')->label('founder of')->required(),
                DatePicker::make('birth_date')->label('birth date'),
                DatePicker::make('death_date')->label('birth date'),
                FileUpload::make('photo')->label('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('fname')->label('first name')->searchable()->sortable(),
                TextColumn::make('lname')->label('last name')->searchable()->sortable(),
                TextColumn::make('mothers_name')->searchable()->sortable(),
                TextColumn::make('death_date')->searchable()->sortable(),
                TextColumn::make('photo')->label('image'),



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
            'index' => Pages\ListScholars::route('/'),
            'create' => Pages\CreateScholars::route('/create'),
            'edit' => Pages\EditScholars::route('/{record}/edit'),
        ];
    }    
}
