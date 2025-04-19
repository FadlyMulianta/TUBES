<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Authenticatable
{
    use HasFactory;

    protected $table = 'pasien';
    

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'foto',
        'emailpasien',
        'passwordpasien',
    ];

    protected $hidden = [
        'passwordpasien',
    ];

    public function getAuthIdentifierName()
    {
        return 'emailpasien';
    }

    public function getAuthPassword()
    {
        return $this->passwordpasien;
    }
}
