<?php

namespace App\Filament\Resources\CourseStudentResource\Pages;

use App\Filament\Resources\CourseStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseStudents extends ListRecords
{
    protected static string $resource = CourseStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
