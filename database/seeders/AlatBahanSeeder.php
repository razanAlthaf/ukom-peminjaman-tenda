<?php

namespace Database\Seeders;

use App\Models\AlatBahan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlatBahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tendas = [
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Eiger',
                'spek' => 'Ukuran 2-3 orang - Double layer',
                'kondisi' => 'Bekas',
                'jumlah_barang' => 4,
                'harga' => 100.000,
                'images' => 'eiger-2.jpeg',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Eiger',
                'spek' => 'Ukuran 4-5 orang - Single layer',
                'kondisi' => 'Bekas',
                'jumlah_barang' => 3,
                'harga' => 120.000,
                'images' => 'eiger-depan-4.jpeg',
            ],
            [
                'nama_barang' => 'Tenda Tunnel',
                'merk' => 'Eiger',
                'spek' => 'Ukuran 6-8 orang - Double layer',
                'kondisi' => 'Baru',
                'jumlah_barang' => 5,
                'harga' => 150.000,
                'images' => 'eiger-depan-6.jpg',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Arei',
                'spek' => 'Ukuran 2-3 orang - Single layer',
                'kondisi' => 'Bekas',
                'jumlah_barang' => 3,
                'harga' => 120.000,
                'images' => 'arei-depan-2.jpg',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Arei',
                'spek' => 'Ukuran 3-4 orang - Double layer',
                'kondisi' => 'Bekas',
                'jumlah_barang' => 5,
                'harga' => 140.000,
                'images' => 'arei-4.jpg',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Arei',
                'spek' => 'Ukuran 5-6 orang - Single layer',
                'kondisi' => 'Baru',
                'jumlah_barang' => 2,
                'harga' => 160.000,
                'images' => 'arei-depan-5.jpg',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Naturehike',
                'spek' => 'Ukuran 2-3 orang - Single layer',
                'kondisi' => 'Bekas',
                'jumlah_barang' => 3,
                'harga' => 150.000,
                'images' => 'naturalize-depan-2.webp',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Naturehike',
                'spek' => 'Ukuran 4-5 orang - Double layer',
                'kondisi' => 'Baru',
                'jumlah_barang' => 2,
                'harga' => 170.000,
                'images' => 'naturalize-depan-4.webp',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Naturehike',
                'spek' => 'Ukuran 5-6 orang - Single layer',
                'kondisi' => 'Baru',
                'jumlah_barang' => 2,
                'harga' => 200.000,
                'images' => 'naturalize-depan-6.webp',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Coleman',
                'spek' => 'Ukuran 2-3 orang - Single layer',
                'kondisi' => 'Bekas',
                'jumlah_barang' => 4,
                'harga' => 150.000,
                'images' => 'coleman-2.avif',
            ],
            [
                'nama_barang' => 'Tenda Dome',
                'merk' => 'Coleman',
                'spek' => 'Ukuran 4-5 orang - Single layer',
                'kondisi' => 'Baru',
                'jumlah_barang' => 3,
                'harga' => 170.000,
                'images' => 'coleman-depan-4.avif',
            ],
            [
                'nama_barang' => 'Tenda Tunnnel',
                'merk' => 'Coleman',
                'spek' => 'Ukuran 5-6 orang - Single layer',
                'kondisi' => 'Baru',
                'jumlah_barang' => 2,
                'harga' => 200.000,
                'images' => 'coleman-depan-6.avif',
            ],
        ];

        foreach ($tendas as $item) {
            AlatBahan::create($item);
        }

    }
}
