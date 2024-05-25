<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pilihan extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'calon_id'
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function calon(): BelongsTo
    {
        return $this->belongsTo(Calon::class);
    }
}
