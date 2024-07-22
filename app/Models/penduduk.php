<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'nik',
        'nama',
        'foto',
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
        'status_penduduk',
        'petugas_id',
        'masyarakat_nik'
    ];

    /**
     * Get the petugas that manages the penduduk.
     */
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }

    /**
     * Get the masyarakat that is related to the penduduk.
     */
    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'masyarakat_nik', 'nik');
    }
}
