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
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Final</th>
                                        <th>Tipo de Alquiler</th>
                                        <th>Bicicleta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alquileres as $alquilere)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $alquilere->fechaInicial }}</td>
                                            <td>{{ $alquilere->fechaFinal }}</td>
                                            <td>{{ $alquilere->tpAlquiler }}</td>
                                            <td>{{ $alquilere->bicicleta->marca }}</td>
                                            <td>
                                                <form action="{{ route('alquileres.destroy', $alquilere->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('alquileres.show', $alquilere->id) }}" data-bs-toggle="modal" data-bs-target="#alquilerModal">{{ __('Ver alquiler') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alquileres.edit', $alquilere->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Actualizar alquiler') }}
                                                    </a>
                                                    <a href="{{ route('entregas.create', ['id_alquileres' => $alquilere->id]) }}" class="btn btn-primary">Entregar</a>
                                                    <a class="btn btn-info" href="{{ route('contactanos', $alquilere->id) }}">
                                                        <i class="fa fa-fw fa-envelope"></i> {{ __('Confirmar alquiler por Correo') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Está seguro que desea eliminar?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar Alquiler') }}
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
