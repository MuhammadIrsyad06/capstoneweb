<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profile';
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'logo', 'jumlah_rombel', 'jumlah_siswa', 'jumlah_guru', 'jumlah_tendik'];
}
