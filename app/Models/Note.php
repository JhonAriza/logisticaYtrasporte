<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];
    // esta propiedad sirve para ocultar el recurso 
    //con el modelo $hidden se especifican los atributos que no se quieren que se muestreen
    protected $hidden =['created_at','updated_at'];
}
