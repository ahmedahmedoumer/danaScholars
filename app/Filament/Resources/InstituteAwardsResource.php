<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstituteAwardsResource\Pages;
use App\Filament\Resources\InstituteAwardsResource\RelationManagers;
use App\Models\instituteAwards;
use App\Models\institution;
use App\models\awards;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstituteAwardsResource extends Resource
{
    protected static ?string $model = instituteAwards::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            Select::make('awards_id')
             ->label('select name award')
             ->options(awards::all()->pluck('name_of_awards', 'id'))
             ->searchable()->required(),
            Select::make('institutions_id')
             ->label('select name of institution')
             ->options(institution::all()->pluck('name', 'id'))
             ->searchable()->required(),
            TextInput::make('description')->label('description'),
            DatePicker::make('created_at')->label('awarded on')
            ->required(),
        ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('awardsName.name_of_awards')->sortable()->searchable(),
                TextColumn::make('institutionName.name')->sortable()->searchable(),
                TextColumn::make('description')->sortable()->searchable(),
                TextColumn::make('created_at')->sortable()->searchable(),



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
            'index' => Pages\ListInstituteAwards::route('/'),
            'create' => Pages\CreateInstituteAwards::route('/create'),
            'edit' => Pages\EditInstituteAwards::route('/{record}/edit'),
        ];
    }    
}
