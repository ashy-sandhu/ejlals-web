<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\HasStabilityShield;

class EditTag extends EditRecord
{
    use HasStabilityShield;

    protected static string $resource = TagResource::class;

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
