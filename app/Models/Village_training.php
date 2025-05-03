<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village_training extends Model
{
    /** @use HasFactory<\Database\Factories\VillageTrainingFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'description',
        'location',
        'link',
    ];

    protected $guarded = [
        'id',
    ];

    protected static function booted()
    {
        static::deleting(function ($villageTraining) {
            if ($villageTraining->img && Storage::disk('public')->exists($villageTraining->img)) {
                Storage::disk('public')->delete($villageTraining->img);
            }
        });

        static::updating(function ($villageTraining){
            if ($villageTraining->isDirty('img')){
                $oldImg = $villageTraining->getOriginal('img');
                if ($oldImg && Storage::disk('public')->exists($oldImg)) {
                    Storage::disk('public')->delete($oldImg);
                }
            }
        });
    }
}
