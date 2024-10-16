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
        Schema::create('tb_sewa', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->BigInteger('id_mobil');
            $table->string('plat_mobil');
            $table->integer('harga_sewa');
            $table->integer('lama_sewa');
            $table->integer('total');
            $table->date('tanggal_sewa');
            $table->date('tanggal_kembali');
            $table->BigInteger('id_user');
            $table->string('nama_user');
            $table->string('status_sewa');
            $table->string('telp')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_mobil', function (Blueprint $table) {
        });
    }
};
