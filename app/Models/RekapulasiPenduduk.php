<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapulasiPenduduk extends Model
{
    use HasFactory;

    protected $table = 'rekapulasi_penduduk';

    protected $fillable = [
        'petugas_id',
        'RT',
        'KK',
        'LAKI_LAKI',
        'PEREMPUAN',
        'BH',
        'BS',
        'TK',
        'SD',
        'SLTP',
        'SLTA',
        'PT',
        'TANI',
        'DAGANG',
        'PNS',
        'TNI',
        'SWASTA',
        'ISLAM',
        'KHALOTIK',
        'PROTESTAN',
        'WNI',
        'WNA',
        'LK1',
        'PR1',
        'LK2',
        'PR2',
        'LK3',
        'PR3',
        'LK4',
        'PR4',
        'KK2',
        'LK5',
        'PR5',
        'KETERANGAN',
    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id');
    }
}
