<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreatePost extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = PostResource::class;

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
