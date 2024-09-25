@extends('layouts.app')

@section('template_title')
    {{ $estadistica->name ?? __('Show') . " " . __('Estadistica') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estadistica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('estadisticas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Alquileres:</strong>
                                    {{ $estadistica->id_alquileres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Entregas:</strong>
                                    {{ $estadistica->id_entregas }}
                                </div>

                    </div>
                </div>
            </div>
            <div class="container">
                <h1>Cantidad de bicicletas alquiladas por mes</h1>
                <canvas id="alquileresChart"></canvas>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('alquileresChart').getContext('2d');
        const alquileresChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico
            data: {
                labels: {!! json_encode($labels) !!}, // Etiquetas de los meses
                datasets: [{
                    label: 'Alquileres',
                    data: {!! json_encode($data) !!}, // Datos de alquileres
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
