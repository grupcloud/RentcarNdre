<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'tb_sewa';
    protected $primaryKey = 'id_sewa';

    protected $fillable = ['id_mobil', 'plat_mobil', 'tanggal_sewa', 'lama_sewa', 'harga_sewa', 'total', 'tanggal_kembali', 'id_user', 'nama_user', 'id_status', 'status_sewa', 'telp', 'email'];

    // Add this relationship method
    public function rentcar()
    {
        return $this->belongsTo(Rentcar::class, 'id_mobil');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
