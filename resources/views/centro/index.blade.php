@extends('layouts.app')

@section('template_title')
    Centros
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Centros') }}</span>
                            <div class="float-right">
                                <a href="{{ route('centros.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Regional</th>
                                        <th>Latitud</th>
                                        <th>Longitud</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($centros as $centro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $centro->nombre }}</td>
                                            <td>{{ $centro->regional }}</td>
                                            <td>{{ $centro->latitud }}</td>
                                            <td>{{ $centro->longitud }}</td>
                                            <td>
                                                <form action="{{ route('centros.destroy', $centro->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('centros.show', $centro->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('centros.edit', $centro->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="event.preventDefault(); 
                                                        confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $centros->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <div id="map" style="height: 500px;"></div>
    <script>
        require([
            "esri/Map",
            "esri/views/MapView",
            "esri/Graphic",
            "esri/symbols/SimpleMarkerSymbol"
        ], function(Map, MapView, Graphic, SimpleMarkerSymbol) {
            var map = new Map({
                basemap: "streets-navigation-vector" // Cambia el basemap si lo deseas
            });

            var view = new MapView({
                container: "map",
                map: map,
                center: [-74.0060, 40.7128], // Longitud y latitud de Nueva York
                zoom: 10
            });

            // Evento para añadir un marcador al hacer clic en el mapa
            view.on("click", function(event) {
                var lat = event.mapPoint.latitude;
                var lon = event.mapPoint.longitude;

                // Crear un símbolo para el marcador
                var pointSymbol = new SimpleMarkerSymbol({
                    color: [226, 38, 54], // Rojo
                    size: 8,
                    outline: {
                        color: [255, 255, 255],
                        width: 1
                    }
                });

                // Crear el gráfico
                var pointGraphic = new Graphic({
                    geometry: {
                        type: "point",
                        longitude: lon,
                        latitude: lat
                    },
                    symbol: pointSymbol
                });

                // Añadir el gráfico al mapa
                view.graphics.add(pointGraphic);

                console.log("Latitud: " + lat + ", Longitud: " + lon); // Para ver las coordenadas en la consola
            });
        });
    </script>
@endsection
