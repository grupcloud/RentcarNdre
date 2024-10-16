<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class M2Controller extends Controller
{
    public function lat1()
    {
        $nama = 'I Kadek Andre Alfiana';
        $alamat = 'Jl. Nusa Dua';
        return view('m4.lat1', compact('nama', 'alamat'));
    }
    
    public function lat2()
    {
        $nama = 'I Kadek Andre Alfiana';
        $nilai = '60';
        return view('m4.lat2', compact('nama', 'nilai'));
    }
    
    public function lat3()
    {
        $nama = 'I Kadek Andre Alfiana';
        $hobi = ['Nonton'];
        $skill = ['HTML', 'CSS', 'PHP' ];
        return view('m4.lat3', compact('nama', 'hobi', 'skill'));
    }
}
