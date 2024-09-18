<?php

namespace App\Imports;

use App\Models\Kependudukan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KependudukanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Kependudukan([
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'nama_rt' => $row['nama_rt'],
            'no_kk' => $row['no_kk'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'umur' => $row['umur'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'alamat' => $row['alamat'],
            'rt_rw' => $row['rtrw'],
            'dusun' => $row['dusun'],
            'kelurahan' => $row['kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['provinsi'],
            'agama' => $row['agama'],
            'status_perkawinan' => $row['status_perkawinan'],
            'pekerjaan' => $row['pekerjaan'],
            'pendidikan' => $row['pendidikan'],
            'kewarganegaraan' => $row['kewarganegaraan'],
            'status_penduduk' => $row['status_penduduk'],
            'petugas_id' => auth()->id(),
        ]);
    }
}