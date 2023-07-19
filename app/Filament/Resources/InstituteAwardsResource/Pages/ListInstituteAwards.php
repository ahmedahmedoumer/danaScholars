<?php

namespace App\Filament\Resources\InstituteAwardsResource\Pages;

use App\Filament\Resources\InstituteAwardsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInstituteAwards extends ListRecords
{
    protected static string $resource = InstituteAwardsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
