<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatBahan extends Model
{
    use HasFactory;

    protected $table = 'alat_bahans';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang',
        'merk',
        'spek',
        'kondisi',
        'jumlah_barang',
        'harga',
    ];
}
