<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Rentcar;
use App\Models\Sewa;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $title = 'Home';

        $jumlah_user = User::count();
        $jumlah_rentcar = Rentcar::count();
        $jumlah_kategori = Kategori::count();
        $jumlah_transaksi = Sewa::count();
        $total_transaksi = Sewa::sum('total');

        $sewas = Sewa::selectRaw('tanggal_sewa, SUM(total) AS total')
            ->groupBy('tanggal_sewa')
            ->limit(30)
            ->get();

        $data = [];
        $categories = [];

        foreach ($sewas as $sewa) {
            $data[] = $sewa->total * 1;
            $categories[] = $sewa->tanggal_sewa;
        }

        return view('home', compact('title', 'jumlah_user', 'jumlah_rentcar', 'jumlah_transaksi', 'total_transaksi', 'data', 'categories'));
    }
}
