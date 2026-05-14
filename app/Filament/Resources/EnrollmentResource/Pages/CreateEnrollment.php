<?php

namespace App\Filament\Resources\EnrollmentResource\Pages;

use App\Filament\Resources\EnrollmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateEnrollment extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = EnrollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getCancelFormAction(),
            $this->getCreateFormAction(),
            ...(method_exists($this, 'getCreateAnotherFormAction') ? [$this->getCreateAnotherFormAction()] : []),
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
