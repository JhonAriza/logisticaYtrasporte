<div class="container">

    <h6>{{$modo}} Cliente</h6>

    <div class="row">
    <div class="col-6">
        <label for="documento">documento</label>
// aca  se obtiene el valor del registro  si existe  sino no muestra nada value="{{ isset($item->documento) ?$item->documento:'' }}"

        <input type="text" class="form-control" required  name="documento" id="documento" value="{{ isset($item->documento)?$item->documento:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo documento</div>
    </div> 
    <div class="col-6">
        <label for="documento">nombre</label>
        <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ isset($item->nombre)?$item->nombre:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo nombre</div>
    </div> </div>
 


    <div class="row">
    <div class="col-6">
        <label for="apellido">apellido</label>
        <input type="text" class="form-control" required name="apellido" id="apellido" value="{{ isset($item->apellido)?$item->apellido:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo apellido</div>
    </div>  
    <div class="col-6">
        <label for="telefono">telefono</label>
        <input type="text" class="form-control" required name="telefono" id="telefono" value="{{ isset($item->telefono)?$item->telefono:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo telefono</div>
    </div>  

 
    <div class="col-6">
        <label for="latitud">latitud</label>
        <input type="text" class="form-control" required name="latitud"  id="latitud" value="{{ isset($item->latitud)?$item->latitud:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo latitud</div>
    </div>  

 
    <div class="col-6">
        <label for="longitud">longitud</label>
        <input type="text" class="form-control" required name="longitud" id="longitud" value="{{ isset($item->longitud)?$item->longitud:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo longitud</div>
    </div>
 </div>
    <br>

   <!-- SE CREA SELECT PARA LA LLAVE FORANEA de Proveeedor -->
   <div class="row">
    <div class="col-12">
        <div class='mb4'>
            <select class="form-control" name="ruta_id" required>
                <option value="">Selelecionar Ruta</option>
                @foreach ($rutas as $item)
                <option value="{{ $item->id }}">
                    {{ $item->nombre}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta seleccionar ruta </div>
        </div>
       </div>
    <br>

<div>   <input type="submit" class="btn btn-secondary" value="{{$modo}} cliente">
    <a href="  {{url('cliente/')}}" class="btn btn-warning">Regresar al inicio de clientes</a> </div>
 <br>
 

    <div class="row">
        <div class="col-md-12">
            <div id="mapa" style="width:100%; height:500px;" ></div>
        </div>
    </div>

 

</div>


<script>
    // validacion de campos del formulario BOOSTRAP
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

<script>
function iniciarMapa(){
var latitud  = 4.68144;
var longitud = -74.06453;
coordenadas = {
    lng: longitud,
    lat: latitud
}
generarMapa(coordenadas);
}
function generarMapa(coordenadas){
    var mapa = new google.maps.Map(document.getElementById('mapa'),
    {
        zoom: 12,
        center : new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
     
    });
    marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

marcador.addListener('dragend',function(event){
document.getElementById("latitud").value = this.getPosition().lat();
document.getElementById("longitud").value = this.getPosition().lng();
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi3QPmKew6ZyLMcOhhU9qfH1lE_co6oys&callback=iniciarMapa"></script>