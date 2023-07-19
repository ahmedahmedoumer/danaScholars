<?php

namespace App\Filament\Resources\ScholarsResource\Pages;

use App\Filament\Resources\ScholarsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScholars extends EditRecord
{
    protected static string $resource = ScholarsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
