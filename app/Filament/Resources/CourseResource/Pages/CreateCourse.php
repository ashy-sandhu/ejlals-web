<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreateCourse extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = CourseResource::class;
}
