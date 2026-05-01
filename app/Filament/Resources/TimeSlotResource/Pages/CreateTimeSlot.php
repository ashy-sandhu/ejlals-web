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
}
