@extends('layouts.app')


@section('content')

<div class="container">

<img src="{{URL::asset('/img/j.jpg')}}" width="50%" class="sidebar-toggle" data-toggle="push-menu" role="button">

    <div class="row">
        <div class="col-9">
            <div class="col-md-12">
                <div id="map" style="width:100%; height:500px;"></div>

            </div>
        </div>
        <div class="col-3">
            <form class="d-flex" action="{{ route('mapa.index' )}}" methods="GET">
                <input class="form-control me-2" placeholder="Search" aria-label="Search" name="busqueda">

                <button class="btn btn-outline-success" value="énviar" href="#buscar" type="submit">Buscar</button>
            </form>
            <br>







            <div class="row">
                <div class='mb4'>
                    <select id="ruta"   class="form-control" name="ruta_id" required>
                        <option value="">Selelecionar Ruta <b>A</b></option>
                        @foreach($rutas as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->latitud }},
                            {{ $item->longitud }}
                        </option>
                        @endforeach
                    </select>
                    <input  id="servicioSelecionado" name="servicioSelecionado" >
                </div>
            </div>
            <br>
            <div class="row">
                <br>

                <div class='mb4'>
                    <select id="ruta2"  class="form-control" name="ruta_id2" required>
                        <option value="">Selelecionar Ruta <b>B</b></option>
                        @foreach($clientes as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->latitud }},
                            {{ $item->longitud }}
                        </option>
                        @endforeach
                    </select>
                  <input   id="servicioSelecionado2" name="servicioSelecionado2">  
        
                </div>

 
                
            </div>
<br>
            <button  class="btn btn-outline-success" onclick="iniciarMapa()">Calcular Ruta</button>
            <br>
            <div id="buscar">
                <div class="row">

                    @foreach($rutas as $item)
                    <td>
                        <div>{{ $item->nombre }} </div>
                    </td>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
 
    function iniciarMapa() {
 
    
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: {
                lat: 4.761784564993355,
                lng: -74.03705835979353
            }
        });
       
        directionsDisplay.setMap(map);
        var start = new google.maps.LatLng(5.149876706205327, -74.52189172941029);
        var end = new google.maps.LatLng(4.890999326851274, -74.4439293520081);
        var request = {
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        };
        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionsDisplay.setDirections(result);
            }
        });

        $(document).on('change', '#ruta', function(event) {
       rutaEnvia = $('#servicioSelecionado').val($("#ruta option:selected").text());
       alert(rutaEnvia);
       });

    $(document).on('change', '#ruta2', function(event) {
       rutaEnvia2 = $('#servicioSelecionado2').val($("#ruta2 option:selected").text());
    });
 
    }
 
</script>










<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi3QPmKew6ZyLMcOhhU9qfH1lE_co6oys&callback=iniciarMapa"></script>
@endsection