@extends('layouts.app')

@section('template_title')
    {{ $centro->name ?? __('Show') . " " . __('Centro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Centro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('centros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>Nombre:</strong>
                            {{ $centro->nombre }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Regional:</strong>
                            {{ $centro->regional }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Latitud:</strong>
                            {{ $centro->latitud }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Longitud:</strong>
                            {{ $centro->longitud }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="map" style="height: 500px;"></div> <!-- Mapa aquí -->
        
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
                    center: [{{ $centro->longitud }}, {{ $centro->latitud }}], // Longitud y latitud del centro
                    zoom: 12 // Ajusta el zoom según necesites
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
                view.graphics.add(pointGraphic);
            });
        </script>
    </section>
@endsection
