<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            'nama_user' => 'Administrator',
            'username' => 'Admin',
            'password' => Hash::make('12345678'),
            'telp' => '123456789',
            'level' => 'admin',
            'email' => 'admin@gmail.com',
        ]);

        DB::table('tb_user')->insert([
            'nama_user' => 'Andre',
            'username' => 'andre',
            'password' => Hash::make('1234567'),
            'telp' => '1234567891',
            'level' => 'User',
            'email' => 'andre@gmail.com',
        ]);

        DB::table('tb_user')->insert([
            'nama_user' => 'Alfian',
            'username' => 'alfian',
            'password' => Hash::make('123456789'),
            'telp' => '1234567892',
            'level' => 'User',
            'email' => 'alfian@gmail.com',
        ]);

        DB::table('tb_user')->insert([
            'nama_user' => 'Kadek',
            'username' => 'kadek',
            'password' => Hash::make('023456789'),
            'telp' => '1234567893',
            'level' => 'User',
            'email' => 'kadek@gmail.com',
        ]);

        DB::table('tb_user')->insert([
            'nama_user' => 'Laras',
            'username' => 'laras',
            'password' => Hash::make('0123456789'),
            'telp' => '1234567894',
            'level' => 'User',
            'email' => 'laras@gmail.com',
        ]);
    }
}
