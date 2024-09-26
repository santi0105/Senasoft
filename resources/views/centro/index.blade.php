@extends('layouts.app')

@section('template_title')
    Centros
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Centros') }}</span>
                            <div class="float-right">
                                <a href="{{ route('centros.create') }}" class="btn btn-light btn-sm" data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-light">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead" style="background-color: #d0e9d0;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Regional</th>
                       
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($centros as $centro)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $centro->nombre }}</td>
                                            <td>{{ $centro->regional }}</td>
                                  
                                            <td>
                                                <form action="{{ route('centros.destroy', $centro->id) }}" method="POST">
                                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mapModal{{ $centro->id }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Ubicación') }}
                                                    </button>
                                                    <a class="btn btn-sm btn-success" href="{{ route('centros.edit', $centro->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Actualizar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="event.preventDefault(); 
                                                        confirm('¿Está seguro de eliminar?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal para el Mapa -->
                                        <div class="modal fade" id="mapModal{{ $centro->id }}" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #4CAF50; color: white;">
                                                        <h5 class="modal-title" id="mapModalLabel">{{ __('Mapa de: ' . $centro->nombre) }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="map{{ $centro->id }}" style="height: 400px;"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cerrar') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

    <script>
        require([
            "esri/Map",
            "esri/views/MapView",
            "esri/Graphic",
            "esri/symbols/SimpleMarkerSymbol"
        ], function(Map, MapView, Graphic, SimpleMarkerSymbol) {
            @foreach ($centros as $centro)
                var map{{ $centro->id }} = new Map({
                    basemap: "streets-navigation-vector"
                });

                var view{{ $centro->id }} = new MapView({
                    container: "map{{ $centro->id }}",
                    map: map{{ $centro->id }},
                    center: [{{ $centro->longitud }}, {{ $centro->latitud }}], // Longitud y latitud del centro
                    zoom: 12
                });

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
                        longitude: {{ $centro->longitud }},
                        latitude: {{ $centro->latitud }}
                    },
                    symbol: pointSymbol
                });

                // Añadir el gráfico al mapa
                view{{ $centro->id }}.graphics.add(pointGraphic);
            @endforeach
        });
    </script>
@endsection
