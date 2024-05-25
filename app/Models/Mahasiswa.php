<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
    ];

    public function calon(): BelongsTo
    {
        return $this->belongsTo(Calon::class);
    }

    public function pilihan(): HasOne
    {
        return $this->hasOne(Pilihan::class);
    }
}
