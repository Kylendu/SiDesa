<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen'; // sudah sesuai dengan migration
    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'barang_id');
    }
    protected $fillable = [
        'barang_id',
        'user_id',
        'nik',
        'nama',
        'alamat',
        'tujuan',
        'jumlah',
        'status',
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke inventory (barang)
    public function barang()
    {
        return $this->belongsTo(Inventory::class, 'barang_id');
    }
    
    
    
}
