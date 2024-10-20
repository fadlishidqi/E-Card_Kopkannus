<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class Member extends Authenticatable
{

    protected $fillable = [
        'id_karyawan',
        'nama',
        'departemen',
        'no_telp',
        'email',
    ];

    public function getAuthPassword()
    {
        return null;
    }
}
