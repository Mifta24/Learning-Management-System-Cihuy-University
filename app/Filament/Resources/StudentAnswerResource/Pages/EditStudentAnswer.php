<?php

namespace App\Filament\Resources\StudentAnswerResource\Pages;

use App\Filament\Resources\StudentAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentAnswer extends EditRecord
{
    protected static string $resource = StudentAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
