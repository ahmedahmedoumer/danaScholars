<?php

namespace App\Filament\Resources\BooksResource\Pages;

use App\Filament\Resources\BooksResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBooks extends ListRecords
{
    protected static string $resource = BooksResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
