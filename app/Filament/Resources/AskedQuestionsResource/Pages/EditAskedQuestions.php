<?php

namespace App\Filament\Resources\AskedQuestionsResource\Pages;

use App\Filament\Resources\AskedQuestionsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAskedQuestions extends EditRecord
{
    protected static string $resource = AskedQuestionsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
