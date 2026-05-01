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
}
