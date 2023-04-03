<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

       
    //  campos que se estan trabajando especificamente
    

    static $rules=[
        'title'=>'required',
        'start'=>'required',
        'end'=>'required'
    ];

    protected $fillable=['title','descripcion','start','end'];

}
