<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service_document extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceDocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'surat',
        'keterangan',
        'file_path',
    ];
    protected $guarded = [];
    protected $table = 'service_documents';

    public function getFileUrlAttribute()
    {
        return $this->file_path ? asset('storage/' . rawurlencode($this->file_path)) : null;
    }

    protected static function booted()
    {
        // Hapus file ketika data dihapus
        static::deleting(function ($service_document) {
            if ($service_document->file_path && Storage::disk('public')->exists($service_document->file_path)) {
                Storage::disk('public')->delete($service_document->file_path);
            }
        });
        static::updating(function ($service_document) {
            if ($service_document->isDirty('file_path')) {
                $oldFilePath = $service_document->getOriginal('file_path');
                if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
                    Storage::disk('public')->delete($oldFilePath);
                }
            }
        });
    }
}
