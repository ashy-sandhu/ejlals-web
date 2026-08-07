<?php

namespace App\Filament\Resources\ScholarResource\Pages;

use App\Filament\Resources\ScholarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HasStabilityShield;

class EditScholar extends EditRecord
{
    use HasStabilityShield;

    protected static string $resource = ScholarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->getCancelFormAction(),
            $this->getSaveFormAction()->formId('form'),
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
