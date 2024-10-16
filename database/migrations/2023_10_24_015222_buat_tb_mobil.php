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
        Schema::create('tb_mobil', function (Blueprint $table) {
            $table->id('id_mobil');
            $table->string('nama_mobil', 255);
            $table->unsignedBigInteger('id_kategori');
            $table->string('plat_mobil');
            $table->integer('harga_sewa');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_mobil');
    }
};
