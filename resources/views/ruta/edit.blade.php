
@extends('layouts.app')


@section('content')

<form action="{{ url('/ruta/'.$item->id) }} "  class="needs-validation" novalidate  method="POST" enctype="multipart/form-data">
@csrf
 {{ method_field('PATCH') }}
 
@include('ruta.form',['modo'=>'Editar'])

</form>


@endsection

