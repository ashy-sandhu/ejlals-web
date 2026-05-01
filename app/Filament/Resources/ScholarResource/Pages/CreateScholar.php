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
}
