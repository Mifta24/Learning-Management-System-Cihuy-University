<?php

namespace App\Filament\Resources\ExamAnswerResource\Pages;

use App\Filament\Resources\ExamAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExamAnswer extends EditRecord
{
    protected static string $resource = ExamAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
