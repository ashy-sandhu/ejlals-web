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
}
