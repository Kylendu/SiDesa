<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card_family extends Model
{
    /** @use HasFactory<\Database\Factories\CardFamilyFactory> */
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'no_kk',
        'kepala_keluarga_id',
        'rt',
        'rw',
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
    ];
    public function kepalaKeluarga()
    {
        return $this->belongsTo(Resident::class, 'kepala_keluarga_id');
    }
    public function anggota()
    {
        return $this->hasMany(Resident::class, 'card_family_id'); // ✅ betulnya hasMany
    }
}
