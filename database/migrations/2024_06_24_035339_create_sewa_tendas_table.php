<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sewa_tendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alat_bahan_id')->constrained('alat_bahans');
            $table->string('jumlah_sewa');
            $table->string('nama_penyewa');
            $table->string('no_hp');
            $table->string('kota_kabupaten');
            $table->text('alamat');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_tendas');
    }
};
