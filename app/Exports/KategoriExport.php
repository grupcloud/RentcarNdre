<?php

namespace App\Exports;

use App\Models\Kategori;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class KategoriExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kategori::select('id_kategori', 'nama_kategori')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kategori',
        ];
    }
}
