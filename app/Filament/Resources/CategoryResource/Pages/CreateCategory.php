<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateCategory extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = CategoryResource::class;
}
