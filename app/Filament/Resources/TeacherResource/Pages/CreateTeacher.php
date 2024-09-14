<?php

namespace App\Filament\Resources\TeacherResource\Pages;

use App\Filament\Resources\TeacherResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    protected function afterCreate(): void
    {
        // Setelah user dibuat, tambahkan role 'teacher'
        $this->record->assignRole('teacher');
    }
}
