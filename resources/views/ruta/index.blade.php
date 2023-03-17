@extends('layouts.app')


@section('content')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Hello, world!</title>
</head>

<body>


    @if(Session::has('mensaje'))
    {{ Session::get('mensaje') }}
    @endif

    <div class="row">
        <div class="col">
        </div>
        <div class="col"></div>
        <div class="col">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a type="button" href=" {{url('ruta/create')}}" class="btn btn-outline-info">new ruta</a>
            </div>
        </div>
        <div class="col"></div>
        <div class="col">
            <form class="d-flex" action="{{ route('ruta.index' )}}" methods="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busqueda">

                <button class="btn btn-outline-success" value="énviar" type="submit">Buscar</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
    <br>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                $contador = 0;
                @endphp
                <div class="accordion-item">
                    <table class="table">
                        <thead>
                            <td>
                            <th scope="col">Rutas Existentes</th>


                            </td>
                        </thead>
                    </table>
                    @foreach($rutas as $item)
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" href="#collapseOne{{$contador}}">

                            <td class="" style="color: red;">
                                Ruta {{ $item['nombre'] }}
                            </td>
                        </button>
                    </h2>
                    <div id="collapseOne{{$contador}}" class="collapse " data-parent="#accordion">
                        <div class="accordion-body">
                            <table class="table ">

                                <thead class="bg-gray-50">
                                    <tr>
                                        <th>
                                            id
                                        </th>
                                        <th>
                                            codigo
                                        </th>

                                        <th>
                                            nombre
                                        </th>


                                        <th>
                                            fechaDB
                                        </th>
                                        <th>
                                            acciones
                                        </th>
                                        <th>
                                            acciones
                                        </th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <div>FG{{ $item->id }} </div>
                                        </td>
                                        <td>
                                            <div>{{ $item->codigo }} </div>
                                        </td>
                                        <td>
                                            <div>{{ $item->nombre }} </div>
                                        </td>

                                        <td>
                                            <div> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</div>
                                        </td>


                                        <td>
                                            <a href="{{ url('/ruta/'.$item->id.'/edit') }}" class="btn btn-success">Editar </a>
                                        </td>

                                        <td>

                                            <form action="{{ url('/ruta/'.$item->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <input type="submit" class="btn btn-danger" onclick="return confirm('quieres borrar=?')" value="Delete">
                                            </form>
                                        <td>


                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @php
                    $contador++;
                    @endphp
                    @endforeach

                </div>
            </div>

        </div>
    </div>


</body>

</html>


@endsection