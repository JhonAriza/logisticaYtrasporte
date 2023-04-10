@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-8 bg-info">
            <div class="card">
                <div class="card-header bg-dark  text-white">{{ __('Calendario') }}</div>

                <div class="card-body">
 
   
                <div class="container">
                <div id="agenda">
 
                </div>
 </div>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Datos del evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       <form action="" id="form">
        <!-- // se crea  una llave para poder
        // trabajar los datos es una parte de seguridad un token que se genera  -->
       @csrf
<div class="form-group d-none">
  <label for="">id</label>
  <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>

<div class="form-group">
  <label for="">titulo</label>
  <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="escribe el titulo">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>

 
<div class="form-group">
  <label for="">descripcion</label>
  <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
</div>
<!-- el tido de dato del parametro start y end esta en tipo txt por que 
al pasarlo a tipo date no se muestra la fecha al recuperar y genera error al modificar -->
<div class="form-group  d-none">
  <label for="">start</label>
  <input type="text" class="form-control" name="start" id="start" >
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>


<div class="form-group  d-none">
  <label for="">end</label>
  <input type="text" class="form-control" name="end" id="end" >
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>
       </form>

      </div>
      <div   class="btn-group" role="group">
      <button type="button" class="btn btn-success" id="btnGuardar">guardar</button>
      <button type="button" class="btn btn-danger"  id="btnEliminar">eliminar</button>
      <button type="button" class="btn btn-warning" id="btnModificar">modificar</button>
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
      </div>

    </div>
  </div>
</div>
                  

 

                
   
 

                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection 