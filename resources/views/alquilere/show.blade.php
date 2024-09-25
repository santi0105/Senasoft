@extends('layouts.app')

@section('template_title')
    {{ $alquilere->name ?? __('Show') . " " . __('Alquilere') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #4CAF50; color: white;">
                        <span class="card-title">{{ __('Detalles del Alquiler') }}</span>
                    </div>

                    <div class="card-body bg-light">
                        <div class="text-center">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#alquilerModal">
                                {{ __('Ver Detalles del Alquiler') }}
                            </button>
                        </div>

                        <!-- Modal -->
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
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cerrar') }}</button>
                                        <a class="btn btn-primary" href="{{ route('entregas.create', $alquilere->id) }}">{{ __('Confirmar Entrega') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <a class="btn btn-primary" href="{{ route('alquileres.index') }}">{{ __('Volver') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
