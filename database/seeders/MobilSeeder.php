<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tb_mobil')->insert([
            'nama_mobil' => 'Lamborghini',
            'id_kategori' => 1,
            'plat_mobil' => 'DK 332 YT',
            'harga_sewa' => 1200000,
        ]);

        DB::table('tb_mobil')->insert([
            'nama_mobil' => 'Ferari',
            'id_kategori' => 1,
            'plat_mobil' => 'DK 322 TT',
            'harga_sewa' => 1100000,
        ]);

        DB::table('tb_mobil')->insert([
            'nama_mobil' => 'Mini Cooper',
            'id_kategori' => 2,
            'plat_mobil' => 'DK 123 KG',
            'harga_sewa' => 820000,
        ]);

        DB::table('tb_mobil')->insert([
            'nama_mobil' => 'Avansa',
            'id_kategori' => 2,
            'plat_mobil' => 'DK 235 RE',
            'harga_sewa' => 750000,
        ]);

        DB::table('tb_mobil')->insert([
            'nama_mobil' => 'Ertiga',
            'id_kategori' => 2,
            'plat_mobil' => 'DK 732 WG',
            'harga_sewa' => 870000,
        ]);
    }
}
