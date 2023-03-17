
@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruta</title>
</head>
<body>
    
</body>
</html>
 

<form action="{{ url('/ruta') }} "   class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
@csrf
<h1>crear datos</h1>
@include('ruta.form',['modo'=>'Crear'])
</form>


@endsection
