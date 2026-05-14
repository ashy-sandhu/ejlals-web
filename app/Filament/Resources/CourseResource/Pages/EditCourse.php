<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HasStabilityShield;

class EditCourse extends EditRecord
{
    use HasStabilityShield;

    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getCancelFormAction(),
            $this->getSaveFormAction(),
            Actions\ActionGroup::make([
                Actions\DeleteAction::make(),
            ])
            ->icon('heroicon-m-ellipsis-vertical')
            ->tooltip('More actions'),
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
