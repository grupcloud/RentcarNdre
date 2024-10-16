<?php

namespace App\Http\Controllers;

use App\Exports\RentcarExport;
use App\Exports\UserExport;
use App\Models\Kategori;
use App\Models\Rentcar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RentcarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function rentcarexport()
    {
        return Excel::download(new RentcarExport, 'datamobil.xlsx');
    }

    public function index(Request $request)
    {
        $title = 'Data Rentcar';
        $q = $request->query('q');
        $sort = $request->query('sort');

        $rentcars = Rentcar::when($q, function ($query, $q) {
            return $query->where('nama_kategori', 'like', '%' . $q . '%')
                ->orWhere('nama_mobil', 'like', '%' . $q . '%')
                ->orWhere('plat_mobil', 'like', '%' . $q . '%');
        })
            ->when($sort, function ($query, $sort) {
                if ($sort === 'harga_asc') {
                    return $query->orderBy('harga_sewa', 'asc');
                } elseif ($sort === 'harga_desc') {
                    return $query->orderBy('harga_sewa', 'desc');
                }
            })
            ->leftJoin('tb_kategori', 'tb_kategori.id_kategori', 'tb_mobil.id_kategori')
            ->paginate(10)
            ->withQueryString();

        $no = $rentcars->firstItem();

        return view('rentcar.index', compact('title', 'rentcars', 'q', 'no'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Produk';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('rentcar.create', compact('title', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required',
            'id_kategori' => 'required',
            'plat_mobil' => 'required',
            'harga_sewa' => 'required',
        ]);

        $rentcar = new Rentcar([
            'nama_mobil' => $request->input('nama_mobil'),
            'id_kategori' => $request->input('id_kategori'),
            'plat_mobil' => $request->input('plat_mobil'),
            'harga_sewa' => $request->input('harga_sewa'),
        ]);

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $filename = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('images/rentcar', $filename);
            $rentcar->gambar = $filename;
        } else {
            $rentcar->gambar = null;
        }

        $rentcar->save();

        return redirect()->route('rentcar.index')->with(['message' => 'Data berhasil ditambah!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Rentcar $rentcar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rentcar $rentcar)
    {
        $title = 'Ubah';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('rentcar.edit', compact('title', 'rentcar', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rentcar $rentcar)
    {
        $request->validate([
            'nama_mobil' => 'required',
            'id_kategori' => 'required',
            'plat_mobil' => 'required',
            'harga_sewa' => 'required',
        ]);

        // Update only the necessary fields
        $rentcar->update([
            'nama_mobil' => $request->input('nama_mobil'),
            'id_kategori' => $request->input('id_kategori'),
            'plat_mobil' => $request->input('plat_mobil'),
            'harga_sewa' => $request->input('harga_sewa'),
        ]);
        $data = $request->all();
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar');
            $filename = rand(1000, 9999) . $gambar->getClientOriginalName();
            $gambar->move('images/rentcar', $filename);
            $data['gambar'] = $filename;
        }
        $rentcar->update($data);
        return redirect()->route('rentcar.index')->with(['message' => 'Data berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentcar $rentcar)
    {
        $rentcar->delete();
        return redirect()->route('rentcar.index')->with(['message' => 'Data berhasil dihapus!']);
    }
}
