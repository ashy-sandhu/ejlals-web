<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateTag extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = TagResource::class;

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
