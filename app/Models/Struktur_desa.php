<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Struktur_desa extends Model
{
    /** @use HasFactory<\Database\Factories\StrukturDesaFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
    ];

    protected static function booted()
    {
        // Hapus file ketika data dihapus
        static::deleting(function ($struktur) {
            if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
                Storage::disk('public')->delete($struktur->foto);
            }
        });

        // Hapus file ketika data diupdate
        static::updating(function ($struktur) {
            if ($struktur->isDirty('foto')) {
                $oldFoto = $struktur->getOriginal('foto');
                if ($oldFoto && Storage::disk('public')->exists($oldFoto)) {
                    Storage::disk('public')->delete($oldFoto);
                }
            }
        });
    }
}
