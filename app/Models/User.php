<?php

namespace App\Models;

use App\Exports\UserExport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Facades\Excel;

class User extends Authenticable
{
    use HasFactory;

    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';

    protected $fillable = ['nama_user', 'username', 'password', 'telp', 'level', 'email'];
}
