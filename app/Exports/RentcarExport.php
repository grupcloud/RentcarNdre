<?php

namespace App\Exports;

use App\Models\Rentcar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RentcarExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $mobilData = Rentcar::leftJoin('tb_kategori', 'tb_mobil.id_kategori', '=', 'tb_kategori.id_kategori')
            ->select('tb_mobil.id_mobil', 'tb_mobil.nama_mobil', 'tb_kategori.nama_kategori', 'tb_mobil.harga_sewa', 'tb_mobil.plat_mobil')
            ->get();
        return $mobilData;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kategori',
            'Harga Sewa',
            'Plat',
        ];
    }
}
