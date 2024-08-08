<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'petugas';
     protected $guard_name = 'web'; 

    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'foto',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'id_petugas');
    }

     public function rekapulasiPenduduks()
    {
        return $this->hasMany(RekapulasiPenduduk::class, 'petugas_id');
    }

      public function dokumentasi()
    {
        return $this->hasMany(Dokumentasi::class, 'id_petugas');
    }

     public function pemerintahDesa()
    {
        return $this->hasMany(PemerintahDesa::class, 'petugas_id');
    }

     public function kependudukan()
    {
        return $this->hasMany(Kependudukan::class, 'petugas_id');
    }

    public function pengumumans()
    {
        return $this->hasMany(Pengumuman::class, 'petugas_id');
    }
}
