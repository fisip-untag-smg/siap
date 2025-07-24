<?php

namespace App\Filament\Resources\IjinUsahaResource\Pages;

use App\Filament\Resources\IjinUsahaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIjinUsaha extends EditRecord
{
    protected static string $resource = IjinUsahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
