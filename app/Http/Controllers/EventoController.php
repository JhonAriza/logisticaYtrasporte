<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;
class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
      return view('evento.index');
   

 
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
        // se aplica la validacion para validar los datos
        
        request()->validate(Evento::$rules);
        // se crea la instruccion para crear los datos y se recibe todo lo que trae el request 
        // para que se cree la informacion con todos los datos que estan llegando
        $evento=Evento::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {

        // aceder a todos los registros de la base de datos
       // traemos todos los registros
         $evento= Evento::all();
    // retornamos todos los registros en un formato json
    // y se le pasa el $evento como parametro
        return response()->json($evento);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // se recupera la informacion 
        // se consulta con el metodo find por id
        $evento = Evento::find($id);
        // envia la respuesta de los datos consultados
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);
        $evento->update($request->all());
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // se busca el registro se hace el delete con el  id
         $evento =Evento::find($id)->delete();
         // responde una respuesta donde se envia lo que ha sucedido
         return response()->json($evento);
    }
}
