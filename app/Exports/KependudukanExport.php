<?php

namespace App\Exports;

use App\Models\Kependudukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KependudukanExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Kependudukan::select(
            'id',
            'rt_rw',
            'nama_rt',
            'nama',
            'nik',
            'no_kk',
            'tempat_lahir',
            'tanggal_lahir',
            'umur',
            'jenis_kelamin',
            'alamat',
            'dusun',
            'kelurahan',
            'kecamatan',
            'kabupaten',
            'provinsi',
            'agama',
            'status_perkawinan',
            'pekerjaan',
            'pendidikan',
            'kewarganegaraan',
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
            'RT/RW',
            'Nama RT',
            'Nama',
            'NIK',
            'NO KK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Umur',
            'Jenis Kelamin',
            'Alamat',
            'Dusun',
            'Kelurahan',
            'Kecamatan',
            'Kabupaten',
            'Provinsi',
            'Agama',
            'Status Perkawinan',
            'Pekerjaan',
            'Pendidikan',
            'Kewarganegaraan',
            'Status Penduduk',
        ];
    }

     public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'FFFF00']
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }
}