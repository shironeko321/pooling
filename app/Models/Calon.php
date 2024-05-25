<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Calon extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'ketua_id',
        'wakil_ketua_id',
        'visi',
        'misi',
        'kotak_kosong'
    ];

    protected $cast = [
        'kotak_kosong' => 'boolean'
    ];

    public function calonketua(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'ketua_id');
    }

    public function calonwakilketua(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'id', 'wakil_ketua_id');
    }

    public function pilihan(): HasMany
    {
        return $this->hasMany(Pilihan::class, 'calon_id', 'id');
    }
}
