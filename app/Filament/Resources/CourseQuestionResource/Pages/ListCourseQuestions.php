<?php

namespace App\Filament\Resources\CourseQuestionResource\Pages;

use App\Filament\Resources\CourseQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseQuestions extends ListRecords
{
    protected static string $resource = CourseQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
