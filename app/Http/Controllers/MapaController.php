<?php

namespace App\Http\Controllers;
use App\Models\Ruta;
use App\Models\Mapa;
use App\Models\Cliente;
use Illuminate\Http\Request;

class MapaController extends Controller
{
    
    public $search = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $busqueda = $request->busqueda;
        $datos['rutas']= Ruta::where('codigo',  'like', '%' . $busqueda . '%')
        ->orwhere('nombre','like', '%' . $busqueda . '%')
        ->orwhere('created_at','like', '%' . $busqueda . '%')
            ->paginate(10);


            $ruta['rutas']=Ruta::paginate(10);
            $cliente['clientes']=Cliente::paginate(10);
        return view('mapa.index',$ruta,$cliente,$datos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapa  $mapa
     * @return \Illuminate\Http\Response
     */
    public function show(Mapa $mapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapa  $mapa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapa $mapa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapa  $mapa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapa $mapa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapa  $mapa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapa $mapa)
    {
        //
    }
}
