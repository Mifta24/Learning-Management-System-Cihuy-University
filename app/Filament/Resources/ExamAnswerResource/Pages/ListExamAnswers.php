<?php

namespace App\Filament\Resources\ExamAnswerResource\Pages;

use App\Filament\Resources\ExamAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExamAnswers extends ListRecords
{
    protected static string $resource = ExamAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
