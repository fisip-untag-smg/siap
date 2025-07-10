<?php

namespace App\Filament\Resources\IjinKtpResource\Pages;

use App\Filament\Resources\IjinKtpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIjinKtps extends ListRecords
{
    protected static string $resource = IjinKtpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
