<?php

namespace App\Filament\Resources\CourseQuestionResource\Pages;

use App\Filament\Resources\CourseQuestionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseQuestion extends EditRecord
{
    protected static string $resource = CourseQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
