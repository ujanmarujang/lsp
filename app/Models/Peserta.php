<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    // 👇 ini penting supaya Laravel gak cari 'pesertas'
    protected $table = 'peserta';

    protected $fillable = [
        'nisn',
        'nama',
        'nis',
        'email',
        'no_hp',
        'jenis_kelamin',
        'agama',
        'alamat',
        'tahun_masuk',
        'jurusan',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
    ];

    protected $dates = ['tanggal_lahir'];
}