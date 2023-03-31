<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\NoteResource;
 
use Illuminate\Support\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Note;

class HomeController extends Controller
{
 
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
     $notas['notas']= Note::all();
    
 
    return view('home',$notas);
   
       
    }
}
