<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitutionResource\Pages;
use App\Filament\Resources\InstitutionResource\RelationManagers;
use App\Models\institution;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitutionResource extends Resource
{
    protected static ?string $model = institution::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
               TextInput::make('name')->required(),
               TextInput::make('location')->required(),
               Select::make('type_of_institution')
                      ->label('type of institution')
                      ->options([
                         "institution type 1"=>'type 1',
                         "institution type 2"=>'type 2',
                         "institution type 3"=>'type 3',
                         "institution type 4"=>'type 4',
                      ])->default('type 1'),
               DatePicker::make('founded_on')
                           ->label('founded on'),
               Select::make('status')
                           ->label('status')
                           ->options([
                              "Active"=>'active',
                              "Passive"=>'passive',
                           ])->default('active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('location')->limit(15)->searchable()->sortable(),
                TextColumn::make('type_of_institution')->searchable()->sortable(),
                TextColumn::make('status')->searchable()->sortable(),
                TextColumn::make('founded_on')->searchable()->sortable(),
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
            'index' => Pages\ListInstitutions::route('/'),
            'create' => Pages\CreateInstitution::route('/create'),
            'edit' => Pages\EditInstitution::route('/{record}/edit'),
        ];
    }    
}
