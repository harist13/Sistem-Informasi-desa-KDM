<?php

namespace App\Exports;

use App\Models\Kependudukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KependudukanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kependudukan::select(
            'id',
            'nik',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'alamat',
            'rt_rw',
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'agama',
            'status_perkawinan',
            'pekerjaan',
            'status_penduduk'
        )->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'NIK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat',
            'RT/RW',
            'Kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Agama',
            'Status Perkawinan',
            'Pekerjaan',
            'Status Penduduk',
        ];
    }
}