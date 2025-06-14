<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'namaPelanggan',
        'notelp',
        'perumahan_id',
        'karyawan_id',
        'Harga',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
