<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class M5Controller extends Controller
{
    public function lat1(Request $request)
    {
        return $request->all();
    }

    public function lat2()
    {
        return view('m5.lat2');
    }

    public function lat2Action(Request $request)
    {
        $nama = $request->input('nama');
        $nilai = $request->input('nilai');
        if ($nilai >=60)
            $ket = 'lulus';
        else
            $ket = 'ulang';
        return view('m5.lat2_hasil', compact('nama', 'nilai', 'ket'));
    }

    public function tabung()
    {
        return view('m5.tabung');
    }

    public function tabungAction(Request $request)
    {
        $request->validate([
            'jari_jari' => 'required|numeric',
            'tinggi' => 'required|numeric'
        ]);
        
        $jari_jari = $request->input('jari_jari');
        $tinggi = $request->input('tinggi');

        $volume = pi() * pow($jari_jari, 2) * $tinggi;

        return view('m5.tabung_hasil', compact('jari_jari', 'tinggi', 'volume'));
    }
}
