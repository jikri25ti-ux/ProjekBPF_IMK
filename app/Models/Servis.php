<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table = 'servis';

    protected $fillable = [
        'kode_servis',
        'nama_pelanggan',
        'no_hp',
        'nama_barang',
        'kerusakan',
        'status',
        'biaya',
    ];
}
