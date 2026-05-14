<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HasStabilityShield;

class EditBook extends EditRecord
{
    use HasStabilityShield;

    protected static string $resource = BookResource::class;

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
