<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\HasStabilityShield;

class CreatePost extends CreateRecord
{
    use HasStabilityShield;

    protected static string $resource = PostResource::class;
}
