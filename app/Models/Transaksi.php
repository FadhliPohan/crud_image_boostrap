<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_transaksi','kode_pembeli','kode_penjual','kode_barang','jumlah_barang','total_barang'
    ];
}
