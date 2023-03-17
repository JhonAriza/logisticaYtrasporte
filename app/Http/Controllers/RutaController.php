<?php

namespace App\Http\Controllers;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RutaController extends Controller
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
          
       
 
         return view('ruta.index',$datos);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  
        $ruta['rutas']=Ruta::paginate(10);
        return view('ruta.create',$ruta);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {$datosEmpleado = request()->except(['_token']);
        
        Ruta::insert($datosEmpleado);
        return redirect('ruta')->with('mensaje','Ruta registrada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function show(Ruta $ruta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rutas['ruta']=Ruta::paginate(10);
        $item=Ruta::findOrfail($id);

        return view('ruta.edit' ,compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $datosEmpleado = request()->except(['_token','_method']);
        Ruta::where('id','=',$id)->update($datosEmpleado);
        $item=Ruta::findOrfail($id);
        return view('ruta.edit',compact('item'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruta  $ruta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Ruta::findOrfail($id);
       
        return redirect('ruta')->with('mensaje','Borrado con exito');;
    }
}
