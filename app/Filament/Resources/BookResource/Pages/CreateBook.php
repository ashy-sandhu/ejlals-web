<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateBook extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = BookResource::class;
}
