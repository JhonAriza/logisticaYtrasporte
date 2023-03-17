
@extends('layouts.app')


@section('content')

<form action="{{ url('/cliente/'.$item->id) }} "  class="needs-validation" novalidate  method="POST" enctype="multipart/form-data">
@csrf
 {{ method_field('PATCH') }}
 
@include('cliente.form',['modo'=>'Editar'])

</form>


@endsection

