<?php

namespace App\Exports;

use App\Models\Sewa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SewaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $mobilData = Sewa::leftJoin('tb_mobil', 'tb_mobil.id_mobil', '=', 'tb_sewa.id_mobil')
            ->select(
                'tb_sewa.id_sewa',
                'tb_mobil.nama_mobil',
                'tb_sewa.tanggal_sewa',
                'tb_sewa.lama_sewa',
                'tb_mobil.harga_sewa',
                'tb_sewa.total',
                'tb_sewa.tanggal_kembali',
                'tb_sewa.nama_user',
                'tb_sewa.status_sewa',
                'tb_sewa.telp',
                'tb_sewa.email'
            )->get();
        return $mobilData;
    }

    public function headings(): array
    {
        return [
            'No',
            'Mobil',
            'Tanggal Sewa',
            'Lama Sewa',
            'Harga Sewa',
            'Total',
            'Tanggal Kembali',
            'Nama User',
            'Status Sewa',
            'Telepon',
            'Email'
        ];
    }
}
