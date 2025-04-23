<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'alamat',
        'website',
        'logo',
        'ttd_kepsek',
    ];
}
