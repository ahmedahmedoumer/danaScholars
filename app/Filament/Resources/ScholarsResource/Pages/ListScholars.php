<?php

namespace App\Filament\Resources\ScholarsResource\Pages;

use App\Filament\Resources\ScholarsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScholars extends ListRecords
{
    protected static string $resource = ScholarsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
