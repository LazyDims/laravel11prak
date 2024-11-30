<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progdi extends Model
{
    protected $fillable = ['nm_fakultas','nm_progdi'];
    protected $primaryKey = 'id_progdi';
}
