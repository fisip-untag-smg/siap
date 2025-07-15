<?php

namespace App\Filament\Resources\KartuTandaPendudukResource\Pages;

use App\Filament\Resources\KartuTandaPendudukResource;
use App\Models\KartuTandaPenduduk;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Illuminate\Database\Eloquent\Model;

class ListKartuTandaPenduduks extends ListRecords
{
    protected static string $resource = KartuTandaPendudukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->using(function (array $data, string $model): Model {
                $prefix = '332216' . \Carbon\Carbon::parse($data['tanggal_lahir'])->format('dmy');

                // Explicitly query the model
                $lastNik = KartuTandaPenduduk::where('nik', 'like', $prefix . '%')
                    ->orderBy('nik', 'desc')
                    ->value('nik');

                $lastNumber = $lastNik ? (int) substr($lastNik, -4) : 0;
                $newNumber  = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

                $data['nik'] = $data['nik'] ?: $prefix . $newNumber;
                    return $model::create($data);
                }),
        ];
    }
}
