<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AskedQuestionsResource\Pages;
use App\Filament\Resources\AskedQuestionsResource\RelationManagers;
use App\Models\askedQuestions;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AskedQuestionsResource extends Resource
{
    protected static ?string $model = askedQuestions::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('asked_questions')->required()->label('asked question'),
                TextInput::make('answers')->required()->label('dnswer'),
                TextArea::make('description')->required()->label('description'),

                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')->sortable()->searchable(),
            TextColumn::make('asked_questions')->limit(20)->sortable()->searchable(),
            TextColumn::make('answers')->limit(20)->sortable()->searchable(),
            TextColumn::make('description')->limit(20),

            // BooleanColumn::make('is_published')->searchable(),
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
            'index' => Pages\ListAskedQuestions::route('/'),
            'create' => Pages\CreateAskedQuestions::route('/create'),
            'edit' => Pages\EditAskedQuestions::route('/{record}/edit'),
        ];
    }    
}
