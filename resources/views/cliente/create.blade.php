
@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>create</title>
</head>
<body>
    
</body>
</html>
 <div class="row"> <h4>ojo</h4>     <p>para que funcione el crear debe tener al menos un registro por que esta consultando los 
  registros de la api para poder crear en base a la base de datos</p>

    <di class="col-2"></di>
    <di class="col-2"> 
        <form class="d-flex"  action="{{ route('cliente.create' )}}" methods="GET">
        <input  class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="busqueda">
        <button class="btn btn-outline-success" value="énviar" type="submit">Buscar</button>
      </form>
    </di>
    
    <di class="col-2"></di>
    <di class="col-2"></di>
    <di class="col-2"></di>
    <di class="col-2"></di>
 </div>
// vamos a enviar el formulario con la propiedad accion con la url a donde lo quiero enviar en este caso es ala ruta cliente 
// atravez del metodo post 
   
                    @foreach($notas as $item)
<form action="{{ url('/cliente') }} "   class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
//lave de seguridad de laravel 
@csrf

@include('cliente.form',['modo'=>'Guardar'])
</form>
    
 
@endforeach
@endsection
 