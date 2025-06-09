<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahapan extends Model
{
    use HasFactory;

    protected $table = 'tahapan'; // tambahkan baris ini

    protected $fillable = [
        'deskripsi_tahapan',
        'volume',
        'bahan_id',
        'pekerjaan_id',
        'status',
        'TotalUpah',
        'transaksi_id',
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
