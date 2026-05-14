<?php

namespace App\Filament\Resources\ScholarResource\Pages;

use App\Filament\Resources\ScholarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateScholar extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = ScholarResource::class;

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
