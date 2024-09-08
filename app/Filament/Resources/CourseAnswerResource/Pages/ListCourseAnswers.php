<?php

namespace App\Filament\Resources\CourseAnswerResource\Pages;

use App\Filament\Resources\CourseAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseAnswers extends ListRecords
{
    protected static string $resource = CourseAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
