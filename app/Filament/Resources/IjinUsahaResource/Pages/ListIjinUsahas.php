<?php

namespace App\Filament\Resources\IjinUsahaResource\Pages;

use App\Filament\Resources\IjinUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIjinUsahas extends ListRecords
{
    protected static string $resource = IjinUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
