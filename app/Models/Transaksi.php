<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'namapelanggan',
        'notelp',
        'perumahan_id',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }
}
