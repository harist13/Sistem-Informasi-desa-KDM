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
}
