<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    /** @use HasFactory<\Database\Factories\ResidentFactory> */
    use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'nik',
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'religion',
        'marital_status',
        'occupation',
        'phone',
        'status',
        'card_family_id',
    ];

    public function cardFamily()
    {
        return $this->belongsTo(Card_Family::class, 'card_family_id');
    }
    public function kepalaKeluargaDari()
    {
        return $this->hasMany(Card_Family::class, 'kepala_keluarga_id');
    }
}
