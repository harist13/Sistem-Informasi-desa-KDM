<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemerintahDesa extends Model
{
    use HasFactory;

    protected $table = 'pemerintah_desa';

    protected $fillable = [
        'nama',
        'jabatan',
        'NIP',
        'Tempat_dan_tanggal_lahir',
        'Agama',
        'jenis_kelamin',
        'pendidikan',
        'alamat',
        'foto',
        'petugas_id',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
