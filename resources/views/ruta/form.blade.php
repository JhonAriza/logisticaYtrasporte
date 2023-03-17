<div class="container">

    <h1>{{$modo}} Ruta</h1>
<div class="row">
    <div class="col-9">
    <label for="nombre">codigo</label>
    <!-- aca le estamos diciendo que si el valor existe que lo imprima si no no imprimir
 nada por que salia errror por que la variable item no tenia nada " 
si existe imprimir sino no imprimir nada-->
    <div>
        <input type="text" class="form-control" name="codigo" id="codigo" value="{{ isset($item->codigo)?$item->codigo:'' }}" required>
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo codigo</div>
    </div>
    </div>
    </div>
    <br>
    <div class="row">
    <div class="col-9">
        <label for="nombre">nombre</label>
        <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ isset($item->nombre)?$item->nombre:'' }}">
        <div class="valid-feedback">Cargando..</div>
        <div class="invalid-feedback">Falta llenar el campo nombre</div>
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
     
   

    <br>


    <input type="submit" class="btn btn-secondary" value="{{$modo}} datos">
    <a href="  {{url('ruta/')}}" class="btn btn-warning">Regresar al inicio</a>

    <br>
    <div class="row">
        <div class="col-md-12">
            <div id="mapa" style="width:100%; height:500px;" ></div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#timepicker').datetimepicker({
            format: 'LT',
            icons: {
                time: "glyphicon glyphicon-time",
                date: "glyphicon glyphicon-calendar",
                up: "glyphicon glyphicon-chevron-up",
                down: "glyphicon glyphicon-chevron-down"
            }
        });
    });
</script>
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
        position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
    });

marcador.addListener('dragend',function(event){
document.getElementById("latitud").value = this.getPosition().lat();
document.getElementById("longitud").value = this.getPosition().lng();
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi3QPmKew6ZyLMcOhhU9qfH1lE_co6oys&callback=iniciarMapa"></script>