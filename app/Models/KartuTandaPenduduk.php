<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuTandaPenduduk extends Model
{
    /** @use HasFactory<\Database\Factories\KartuTandaPendudukFactory> */
    use HasFactory;
    use HasUuids;

    // Tell Eloquent not to expect an auto-incrementing key
    public $incrementing = false;

    // Primary key is a string (UUID)
    protected $keyType = 'string';

    protected $casts = [
    'photo_camera' => 'array',
];
}
