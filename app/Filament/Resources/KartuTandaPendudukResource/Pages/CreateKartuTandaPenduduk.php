<?php

namespace App\Filament\Resources\KartuTandaPendudukResource\Pages;

use App\Filament\Resources\KartuTandaPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateKartuTandaPenduduk extends CreateRecord
{
    protected static string $resource = KartuTandaPendudukResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Generate nik
            if (empty($data['nik'])) {
                $data['nik'] = (string) '3322160101970001'; // Example NIK, replace with your logic
            }
        return static::getModel()::create($data);
    }
}
