@extends('layouts.app')


@section('content')

<div class="container">


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
                    <select id="ruta" class="form-control" name="ruta_id" required>
                        <option value="">Selelecionar Ruta <b>A</b></option>
                        @foreach($rutas as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->latitud }},
                            {{ $item->longitud }}
                        </option>
                        @endforeach
                    </select>
                    <input type='hidden' id="servicioSelecionado" name="nom_Servicio" >
                </div>
            </div>
            <br>
            <div class="row">
                <br>



                <div class='mb4'>
                    <select class="form-control" name="ruta_id" required>
                        <option value="">Selelecionar Ruta <b>B</b></option>
                        @foreach($clientes as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->latitud }},
                            {{ $item->longitud }}
                        </option>
                        @endforeach
                    </select>
                 
                </div>

            </div>


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
        var rutaEnvia = '';
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
        var start = new google.maps.LatLng(rutaEnvia);
        console.log(ruta);
        var end = new google.maps.LatLng(4.646119541485224, -74.07766799996381);
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
    });
    }



 
</script>










<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi3QPmKew6ZyLMcOhhU9qfH1lE_co6oys&callback=iniciarMapa"></script>
@endsection


<!-- <script>
    function iniciarMapa() {
var start_r  =   4.646119541485224 -74.07766799996381;
var end_r =  4.646119541485224 -76.07766799996381;
coordenadas = {
    start: start_r,
    end: end_r
}
    
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
        var start = new google.maps.LatLng(coordenadas.start_r);
        var end = new google.maps.LatLng(coordenadas.end_r);
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

        $(document).on('change1', '#ruta', function(event) {
       rutaEnvia = $('#servicioSelecionado').val($("#ruta option:selected").text());
    });

    $(document).on('change', '#ruta2', function(event) {
       rutaEnvia2 = $('#servicioSelecionado2').val($("#ruta2 option:selected").text());
    });
    }
</script> -->