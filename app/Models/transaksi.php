<?php

namespace App\Models;

use App\Models\stok;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'stok_id',
        'tanggal_transaksi',
        'jumlah_barang',
        'total_harga',
    ];

    public function stok(){
        return $this->belongsTo(stok::class, 'stok_id');
    }

    public function laporan(){
        return $this->hasOne(laporan::class, 'transaksi_id');
    }
}
