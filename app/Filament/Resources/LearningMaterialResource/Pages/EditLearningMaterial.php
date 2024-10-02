<?php

namespace App\Filament\Resources\LearningMaterialResource\Pages;

use App\Filament\Resources\LearningMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLearningMaterial extends EditRecord
{
    protected static string $resource = LearningMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
