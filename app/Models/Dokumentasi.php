<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';

    protected $fillable = [
        'id_petugas',
        'foto',
        'judul',

    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
