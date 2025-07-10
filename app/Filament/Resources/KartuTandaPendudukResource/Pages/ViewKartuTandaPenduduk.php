<?php

namespace App\Filament\Resources\KartuTandaPendudukResource\Pages;

use App\Filament\Resources\KartuTandaPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKartuTandaPenduduk extends ViewRecord
{
    protected static string $resource = KartuTandaPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
