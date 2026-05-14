<?php

namespace App\Filament\Resources\EnrollmentResource\Pages;

use App\Filament\Resources\EnrollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HasStabilityShield;

class EditEnrollment extends EditRecord
{
    use HasStabilityShield;

    protected static string $resource = EnrollmentResource::class;

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
