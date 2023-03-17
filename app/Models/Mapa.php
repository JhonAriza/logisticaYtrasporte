<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapa extends Model
{
    use HasFactory;
    public function ruta()
    {
        return $this->hasOne('App\Models\Ruta','id','ruta_id','nombre');
    }
}
