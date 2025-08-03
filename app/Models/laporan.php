<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'transaksi_id',
        'total_penjualan',
        'tanggal_laporan'
    ];

    public function transaksi(){
        return $this->belongsTo(transaksi::class, 'transaksi_id');
    }
}
