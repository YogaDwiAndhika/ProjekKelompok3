<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahan';

    protected $fillable = [
        'NamaBahan',
        'VolumeBahan',
        'Harga',
        'Pekerjaan_id',
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'Pekerjaan_id');
    }
}
