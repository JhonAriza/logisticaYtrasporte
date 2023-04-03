@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Calendario') }}</div>

                <div class="card-body">
 
   
                <div class="container">
                <div id="agenda">
 
                </div>
 </div>
 
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#evento">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
     
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

       <form action="" id="form">
       @csrf
<div class="form-group">
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

<div class="form-group">
  <label for="">start</label>
  <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>


<div class="form-group">
  <label for="">end</label>
  <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
</div>
       </form>

      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="btnGuardar">guardar</button>
      <button type="button" class="btn btn-warning" id="btnModificar">modificar</button>
      <button type="button" class="btn btn-danger"  id="btnEliminar">eliminar</button>
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