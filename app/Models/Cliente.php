<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
    'documento',
    'nombre',
    'apellido',
    'telefono',
    'latitud',
    'longitud',
    'ruta_id'];

    use HasFactory;

    public function ruta()
    {
        return $this->hasOne('App\Models\Ruta','id','ruta_id');
    }
}
