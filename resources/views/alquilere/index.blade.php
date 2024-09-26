@extends('layouts.app')

@section('template_title')
    Alquileres
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-success">
                    <div class="card-header bg-success text-white">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h4>{{ __('Alquileres') }}</h4>
                            </span>
                            <div class="float-right">
                                <a href="{{ route('alquileres.create') }}" class="btn btn-light btn-sm" data-placement="left">
                                  <i class="fa fa-plus"></i> {{ __('Crear nuevo alquiler') }}
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
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Documento</th>
                                       
                                        <th>Fecha Entrega</th>
                                        <th>Tipo de Alquiler</th>
                                        <th>Bicicleta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alquileres as $alquilere)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $alquilere->user->name }}</td>
                                            <td>{{ $alquilere->user->apellido }}</td>
                                            <td>{{ $alquilere->user->documento }}</td>
                                            <td>{{ $alquilere->fechaInicial }}</td>
                                            
                                            <td>{{ $alquilere->tpAlquiler }}</td>
                                            <td>{{ $alquilere->bicicleta->marca }}</td>
                                            <td>
                                                <form action="{{ route('alquileres.destroy', $alquilere->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('contactanos', $alquilere->id) }}">
                                                        <i class="fa fa-fw fa-envelope"></i> {{ __('Confirmar alquiler') }}
                                                    </a>
                                                    <a href="{{ route('entregas.create', ['id_alquileres' => $alquilere->id]) }}" class="btn btn-primary">Entregar Bicicleta</a>

                                                    <a class="btn btn-outline-dark btn-sm" href="{{ route('alquileres.show', $alquilere->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                        </svg>
                                                    </a>
                                                    <a class="btn btn-outline-warning btn-sm" href="{{ route('alquileres.edit', $alquilere->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
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
                                                <!-- Modal Ver Alquiler -->
                                                <div class="modal fade" id="alquilerModal" tabindex="-1" aria-labelledby="alquilerModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #4CAF50; color: white;">
                                                                <h5 class="modal-title" id="alquilerModalLabel">{{ __('Detalles del Alquiler') }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Fecha Inicial:') }}</strong>
                                                                    <p>{{ $alquilere->fechaInicial }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Fecha Final:') }}</strong>
                                                                    <p>{{ $alquilere->fechaFinal }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Tipo de Alquiler:') }}</strong>
                                                                    <p>{{ $alquilere->tpAlquiler }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Usuario:') }}</strong>
                                                                    <p>{{ $alquilere->user->name }}</p>
                                                                </div>
                                                                <div class="form-group mb-2">
                                                                    <strong>{{ __('Bicicleta Alquilada:') }}</strong>
                                                                    <p>{{ $alquilere->bicicleta->marca }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $alquileres->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            border-bottom: 2px solid #2e7d32; /* Línea inferior verde */
        }
        .table {
            margin-bottom: 0;
        }
        .btn-primary {
            background-color: #4caf50; /* Verde */
            border-color: #4caf50;
        }
        .btn-primary:hover {
            background-color: #45a049; /* Verde oscuro */
        }
        .btn-info {
            background-color: #17a2b8; /* Azul */
            border-color: #17a2b8;
        }
        .btn-info:hover {
            background-color: #138496; /* Azul oscuro */
        }
        .thead-light th {
            background-color: #d4edda; /* Fondo verde claro */
            color: #155724; /* Texto verde */
        }
    </style>
@endsection
