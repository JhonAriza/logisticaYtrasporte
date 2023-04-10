<?php

namespace App\Http\Controllers;
use App\Models\Ruta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Note;

class ClienteController extends Controller
{
    public $search = ' ';
   public $busqueda = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        // se pasa toda la informacion de db 
        $datos['clientes']= Cliente::where('nombre',  'like', '%' . $busqueda . '%')
        ->orwhere('apellido','like', '%' . $busqueda . '%')
        ->orwhere('created_at','like', '%' . $busqueda . '%')
            ->paginate(10);
       
        $ruta['clientes']=Cliente::paginate(10);
 
         return view('cliente.index',$datos,$ruta); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {  
        
        
        $notas['notas']= Note::all();
        $busqueda = $request->busqueda;

            $notas['notas']= Note::where('nombre',  'like', '%' . $busqueda . '%')
            ->orwhere('apellido','like', '%' . $busqueda . '%')
            ->orwhere('documento','like', '%' . $busqueda . '%')
             ->paginate(1);
             

        $ruta['rutas']=Ruta::paginate(10);
        return view('cliente.create',$ruta,$notas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { // del formulario se envian todos los datos al metodo store
        // aca responde si realmente la informacion esta llegando  
        // datos del empleado va aser igual a todos los datos que envien 
        $datosEmpleado = request()->except(['_token']);
        // se recolectan todos los datos del formulario se le quita la llave del token 
        // se agarra el modelo Cliente  y se inserta toda la informacion en la base de datos  
        Cliente::insert($datosEmpleado);
        return redirect('cliente')->with('mensaje','Cliente registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            
        $ruta['rutas']=Ruta::paginate(10);
        // se busca un registro por id  que viene atravez de la url 
        $item=Cliente::findOrfail($id);
//aca se incluyen los datos por id  retornando la vista  
        return view('cliente.edit' ,compact('item'),$ruta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // aca se recibe la informacion del formulario para que se actualice
        // y se le quita el metodo PATCH 
        $datosEmpleado = request()->except(['_token','_method']);
     
        $ruta['rutas']=Ruta::paginate(10);
        // empleado si coincide el id  hace update 
        Cliente::where('id','=',$id)->update($datosEmpleado);
        $item=Cliente::findOrfail($id);
        return view('cliente.edit',compact('item'),$ruta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            
            $item=Cliente::findOrfail($id);
           Cliente::destroy($id);
            return redirect('cliente')->with('mensaje','Borrado con exito');;
        }
    }
}
