@extends('layouts.app')

@section('template_title')
    Entregas
@endsection

<!-- Archivo principal del modulo entrega -->
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Ganancias Mensuales Tiempo Real') }}</span>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <center><h5><strong>Ganancias: ${{ number_format(array_sum($gananciasMensuales), 2) }}</strong></h5></center>

                        <!-- Lienzo para la gráfica -->
                        <canvas id="gananciasGrafica" width="400" height="200"></canvas><br><br>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="mt-4 card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Historial de Entregas') }}</span>
                        </div>
                    </div><br>

                        
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre </th>
                                        <th>Apellido </th>
                                        <th>Cedula </th>
                                        <th>Valor a Pagar</th>
                                        <th>Descuento Estrato</th>
                                        <th>Total Pagado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($entregas as $entrega)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $entrega->alquilere->user->name }}</td>
                                            <td>{{ $entrega->alquilere->user->apellido }}</td>
                                            <td>{{ $entrega->alquilere->user->documento }}</td>
                                            <td>${{ number_format($entrega->valorPagar, 2) }}</td>
                                            <td>${{ number_format($entrega->tarifaAdicional, 2) }}</td>
                                            <td>${{ number_format($entrega->totalPagar, 2) }}</td>
                                            <td>
                                                <form action="{{ route('entregas.destroy', $entrega->id) }}" method="POST">
                                                
                                                    <a class="btn btn-outline-dark btn-sm" href="{{ route('entregas.show', $entrega->id) }}" data-bs-toggle="modal" data-bs-target="#alquilerModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                        </svg>
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estas seguro que deseas eliminar?') ? this.closest('form').submit() : false;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                                        </svg>
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
                                                                    <strong>{{ __('Nombre del Responsable:') }}</strong>
                                                                    <p>{{ $entrega->alquilere->user->name }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Apellido del Responsable:') }}</strong>
                                                                    <p>{{ $entrega->alquilere->user->apellido }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Documento del Responsable:') }}</strong>
                                                                    <p>{{ $entrega->alquilere->user->documento }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Valor a Pagar:') }}</strong>
                                                                    <p>{{ $entrega->valorPagar }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Descuento Estrato:') }}</strong>
                                                                    <p>{{ $entrega->tarifaAdicional }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Total Pagado:') }}</strong>
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
        // Aquí pse agrega el nombre de los meses, yo quice dejar solo los numeros
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
