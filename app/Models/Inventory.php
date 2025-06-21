<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jumlah',
        'img',
    ];

    protected $guarded = [
        'id',
    ];

    protected static function booted()
    {
        static::deleting(function ($inventory){
            if($inventory->img && Storage::disk('public')->exists($inventory->img)){
                Storage::disk('public')->delete($inventory->img);
            }
        });

        static::updating(function ($inventory){
            if($inventory->isDirty('img')){
                $oldImg = $inventory->getOriginal('img');
                if($oldImg && Storage::disk('public')->exists($oldImg)){
                    Storage::disk('public')->delete($oldImg);
                }
            }
        });
    }
}
