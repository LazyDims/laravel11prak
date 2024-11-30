<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pribadi extends Model
{
    protected $fillable = ['nik','nama_mahasiswa', 'tempat_lahir','tanggal_lahir'];
    protected $primaryKey = 'id_pribadi';
}
