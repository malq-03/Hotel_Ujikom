<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class room extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kamar',
        'gambar',
        'deskripsi',
        'harga',
        'wifi',
        'type_kamar',
    ];
}
