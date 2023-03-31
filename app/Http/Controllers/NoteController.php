<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Http\Requests\NoteRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteController extends Controller
{
    // funcion index es para lisar todos los elemtos y registros del modelo
    public function index():JsonResource
    {
        // vamos a utilizar un formato de api response ,para hacer las peticiones a nuestro crud y
        // devolver la informacion atravez de un  formato json
        // retornamos una respuesta een formato json
        // se  indica que devolvemos las notas con un estatus 200 que indica que ha sido satifecha la peticion 
       // ordenes  de refacttorizacion de devolver directmente el Note::all
       // return response()->json(Note::all(),200);
return  NoteResource::collection(Note::all());
    }

    public function store(NoteRequest $request):JsonResponse
    {
        $note =Note::create($request->all()); 
        // se hace la generacion con el metodo store  para generar
         // el elemnento con todos estos valores para etornar una respuesta
        return response()->json([
            'success'=> true,
            'data'=> new NoteResource($note)
        ],201);
    }


    public function show($id):JsonResource
    {
        // funcion de mostrar la info 
        $note = Note::find($id);
       // return response()->json($note,200);
       return new NoteResource($note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   // la funcion de editar no la usamos

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id):JsonResponse
    {
        $note=Note::find($id);
        $note->documento =$request->documento;
        $note->nombre = $request->nombre;
        $note->apellido = $request->apellido;
        $note->save();
        return response()->json([
            'success' => true,
            'data' => new NoteResource(($note))
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id):JsonResponse
    {
         Note::find($id)->delete();
         return response()->json([
            'success' => true
         ],200);
    }
}
