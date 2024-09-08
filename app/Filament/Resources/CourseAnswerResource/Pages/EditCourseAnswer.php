<?php

namespace App\Filament\Resources\CourseAnswerResource\Pages;

use App\Filament\Resources\CourseAnswerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseAnswer extends EditRecord
{
    protected static string $resource = CourseAnswerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
