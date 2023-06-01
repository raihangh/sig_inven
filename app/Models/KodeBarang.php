<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeBarang extends Model
{
    use HasFactory;
    protected $table = 'kode_barangs';
    protected $fillable = [
        'kode_barang',
        'kategori',
        'created_at',
        'updated_at',
    ];
}
