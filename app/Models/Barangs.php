<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'id',
        'nama_barang',
        'kode_barang',
        'harga',
        'quantity',
        'quantity_pack',
        'status',
        'created_at',
        'updated_at',
    ];
}
