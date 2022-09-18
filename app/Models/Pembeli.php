<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pembeli','alamat_pembeli','foto_pembeli','NIK','jk_pembeli'
    ];
}
