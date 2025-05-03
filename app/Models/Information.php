<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Information extends Model
{
    /** @use HasFactory<\Database\Factories\InformationFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'img',
        'author',
        'jenis',
        'kategori',
    ];

    protected $guarded = [
        'id',
    ];
    protected static function booted()
    {
        // Hapus file ketika data dihapus
        static::deleting(function ($information) {
            if ($information->img && Storage::disk('public')->exists($information->img)) {
                Storage::disk('public')->delete($information->img);
            }
        });

        // Hapus file ketika data diupdate
        static::updating(function ($information) {
            if ($information->isDirty('img')) {
                $oldImg = $information->getOriginal('img');
                if ($oldImg && Storage::disk('public')->exists($oldImg)) {
                    Storage::disk('public')->delete($oldImg);
                }
            }
        });
    }
}
