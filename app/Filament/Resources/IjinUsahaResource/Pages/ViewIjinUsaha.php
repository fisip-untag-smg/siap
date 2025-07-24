<?php

namespace App\Filament\Resources\IjinUsahaResource\Pages;

use App\Filament\Resources\IjinUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewIjinUsaha extends ViewRecord
{
    protected static string $resource = IjinUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
