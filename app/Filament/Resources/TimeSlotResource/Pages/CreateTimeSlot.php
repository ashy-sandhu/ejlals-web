<?php

namespace App\Filament\Resources\TimeSlotResource\Pages;

use App\Filament\Resources\TimeSlotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateTimeSlot extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = TimeSlotResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getCancelFormAction(),
            $this->getCreateFormAction()->formId('form'),
            ...(method_exists($this, 'getCreateAnotherFormAction') ? [$this->getCreateAnotherFormAction()->formId('form')] : []),
        ];
    }

    protected function getFormActions(): array
    {
        return [];
    }
}
