<?php

namespace App\Models;

use App\Models\transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stok extends Model
{
    use HasFactory;

    protected $table = 'stok';

    protected $fillable = [
        'nama_barang',
        'harga',
        'jumlah'
    ];

    public function transaksi(){
        return $this->hasMany(transaksi::class, 'stok_id');
    }
}
