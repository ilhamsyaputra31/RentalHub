<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenProduks extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'user_id',
        'harga_sewa',
        'deskripsi_barang',
        'Ringkasan',
        'gambar',
        'status',

    ];
}
