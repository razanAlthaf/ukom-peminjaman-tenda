<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaTenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'alat_bahan_id',
        'jumlah_sewa',
        'nama_penyewa',
        'no_hp',
        'kota_kabupaten',
        'alamat',
        'tgl_sewa',
        'tgl_kembali',
    ];

    protected $dates = [
        'tgl_sewa',
        'tgl_kembali',
    ];

    public function alatBahan()
    {
        return $this->belongsTo(AlatBahan::class);
    }
}
