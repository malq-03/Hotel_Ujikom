<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'nama',
        'email',
        'telpon',
        'status',
        'start_date',
        'end_date'
    ];
}
