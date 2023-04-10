<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

       
    //  campos que se estan trabajando especificamente 
    // y que son requeridos

    static $rules=[
        'title'=>'required',
        'descripcion'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];
// se distingue los campos que estoy trabajando
    protected $fillable=['title','descripcion','start','end'];

}
