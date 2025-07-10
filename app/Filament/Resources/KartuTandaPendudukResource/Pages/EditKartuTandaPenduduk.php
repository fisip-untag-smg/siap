<?php

namespace App\Filament\Resources\KartuTandaPendudukResource\Pages;

use App\Filament\Resources\KartuTandaPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKartuTandaPenduduk extends EditRecord
{
    protected static string $resource = KartuTandaPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
