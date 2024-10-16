<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentcar extends Model
{
    use HasFactory;

    protected $table = 'tb_mobil';
    protected $primaryKey = 'id_mobil';

    protected $fillable = ['nama_mobil', 'id_kategori', 'plat_mobil', 'harga_sewa', 'gambar'];

    public function getImage()
    {
        if ($this->gambar && file_exists(public_path('images/rentcar/' . $this->gambar)))
            return asset('images/rentcar/' . $this->gambar);
        else
            return asset('images/no_image.png');
    }
}
