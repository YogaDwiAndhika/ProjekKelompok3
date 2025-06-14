<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';

    protected $fillable = [
        'NamaProyek',
        'perumahan_id',
        'TanggalMulai',
        'TanggalSelesai',
        'EstimasiBiaya',
        'status',
    ];

    // Relasi ke tabel perumahan
    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'perumahan_id');
    }
}
