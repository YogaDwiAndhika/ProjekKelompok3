<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $table = 'perumahan'; // tambahkan baris ini

    protected $fillable = [
        'TipePerumahan',
        'Lokasi',
        'Gambarperumahan',
    ];
}
