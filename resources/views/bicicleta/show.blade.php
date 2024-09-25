@extends('layouts.app')

@section('template_title')
    {{ $bicicleta->marca ?? __('Show') . " " . __('Bicicleta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Bicicleta</span>
                            <div class="float-right">
                                <a class="btn btn-light btn-sm" href="{{ route('bicicletas.index') }}">{{ __('Volver') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center   card-body bg-light">
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $bicicleta->img) }}" alt="{{ $bicicleta->marca }}" class="img-fluid" style="max-height: 300px; object-fit: cover;">
                        </div>
                        <div class="form-group mb-2">
                            <strong>Marca:</strong>
                            {{ $bicicleta->marca }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Color:</strong>
                            {{ $bicicleta->color }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Estado:</strong>
                            {{ $bicicleta->estado }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Precio por hora:</strong>
                            ${{ number_format($bicicleta->precioHora, 2) }}
                        </div>
                        <div class="form-group mb-2">
                            <strong>Centro:</strong>
                            {{ $bicicleta->centro->nombre }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <span>{{ __('Ubicación tiempo real de la bicicleta') }}</span>
                    </div>
                    <div class="card-body">
                        <div id="map" style="height: 500px;"></div> <!-- Mapa aquí -->
                    </div>
                </div>
            </div>
        </div>

        <script>
            require(["esri/Map", "esri/views/MapView", "esri/Graphic", "esri/symbols/SimpleMarkerSymbol"], function(Map, MapView, Graphic, SimpleMarkerSymbol) {
                var map = new Map({
                    basemap: "streets-navigation-vector"
                });

                var view = new MapView({
                    container: "map",
                    map: map,
                    center: [{{ $bicicleta->centro->longitud }}, {{ $bicicleta->centro->latitud }}], // Centrar el mapa en el centro
                    zoom: 12
                });

                // Añadir un marcador para la bicicleta
                var pointSymbol = new SimpleMarkerSymbol({
                    color: [34, 139, 34], // Verde
                    size: 8,
                    outline: {
                        color: [255, 255, 255],
                        width: 1
                    }
                });

                var pointGraphic = new Graphic({
                    geometry: {
                        type: "point",
                        longitude: {{ $bicicleta->centro->longitud }},
                        latitude: {{ $bicicleta->centro->latitud }}
                    },
                    symbol: pointSymbol
                });

                view.graphics.add(pointGraphic);
            });
        </script>
    </section>
@endsection

