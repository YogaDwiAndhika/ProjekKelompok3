<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProyek extends Model
{
    use HasFactory;

    protected $table = 'detailproyek'; // Pastikan sesuai nama tabel di database

    protected $fillable = [
        'proyek_id',
        'bahan_id',
        'volume',
        'pekerjaan_id',
        'TotalBiaya',
    ];

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }

    // Relasi ke Bahan
    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id');
    }

    // Relasi ke Pekerjaan
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan_id');
    }
}
