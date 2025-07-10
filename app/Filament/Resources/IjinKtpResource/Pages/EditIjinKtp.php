<?php

namespace App\Filament\Resources\IjinKtpResource\Pages;

use App\Filament\Resources\IjinKtpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIjinKtp extends EditRecord
{
    protected static string $resource = IjinKtpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
