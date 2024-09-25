@extends('layouts.app')

@section('template_title')
    Entregas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Entregas') }}</span>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <h5>Ganancias Mensuales: ${{ number_format(array_sum($gananciasMensuales), 2) }}</h5>

                        <!-- Lienzo para la gráfica -->
                        <canvas id="gananciasGrafica" width="400" height="200"></canvas>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Id Alquileres</th>
                                        <th>Valorpagar</th>
                                        <th>Tarifaadicional</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entregas as $entrega)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $entrega->id_alquileres }}</td>
                                            <td>${{ number_format($entrega->valorPagar, 2) }}</td>
                                            <td>${{ number_format($entrega->tarifaAdicional, 2) }}</td>
                                            <td>
                                                <form action="{{ route('entregas.destroy', $entrega->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('entregas.show', $entrega->id) }}" data-bs-toggle="modal" data-bs-target="#alquilerModal">{{ __('Ver Entrega') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('entregas.edit', $entrega->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar información de la entrega') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Está seguro de eliminar?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar entrega') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Ver Alquiler -->
                                        <div class="modal fade" id="alquilerModal" tabindex="-1" aria-labelledby="alquilerModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #4CAF50; color: white;">
                                                                <h5 class="modal-title" id="alquilerModalLabel">{{ __('Detalles de Entrega') }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Valor a Cancelar:') }}</strong>
                                                                    <p>{{ $entrega->valorPagar }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Descuento %:') }}</strong>
                                                                    <p>{{ $entrega->tarifaAdicional }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Total a Pagar:') }}</strong>
                                                                    <p>{{ $entrega->totalPagar }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
 
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
                {!! $entregas->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <script>
    // Preparar datos para la gráfica
    const ctx = document.getElementById('gananciasGrafica').getContext('2d');
    const gananciasMensuales = @json($gananciasMensuales);
    
    // Nombres de los meses
    const meses = [
        // Aquí puedes agregar los nombres de los meses
    ];

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: meses,
            datasets: [{
                label: 'Ganancias Mensuales',
                data: gananciasMensuales,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 3
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
