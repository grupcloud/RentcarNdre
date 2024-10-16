<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id_user', 'nama_user', 'username', 'telp', 'level')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Username',
            'Telepon',
            'Level',
        ];
    }
}
