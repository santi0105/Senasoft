@extends('layouts.app')

@section('template_title')
    {{ $entrega->name ?? __('Show') . " " . __('Entrega') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #2E7D32; color: white;">
                        <span class="card-title">{{ __('Detalles de la Entrega') }}</span>
                    </div>

                    <div class="card-body bg-light">
                        <div class="text-center mb-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#entregaModal">
                                {{ __('Ver Detalles de la Entrega') }}
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="entregaModal" tabindex="-1" aria-labelledby="entregaModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2E7D32; color: white;">
                                        <h5 class="modal-title" id="entregaModalLabel">{{ __('Detalles de la Entrega') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-2">
                                            <strong>{{ __('Tipo de Alquiler:') }}</strong>
                                            <p>{{ $entrega->alquilere->tpAlquiler }}</p>
                                        </div>
                                        <div class="form-group mb-2">
                                            <strong>{{ __('Valor a Pagar:') }}</strong>
                                            <p>${{ number_format($entrega->valorPagar, 2) }}</p>
                                        </div>
                                        <div class="form-group mb-2">
                                            <strong>{{ __('Tarifa Adicional con Descuento:') }}</strong>
                                            <p>${{ number_format($entrega->tarifaAdicional, 2) }}</p>
                                        </div>
                                        <div class="form-group mb-2">
                                            <strong>{{ __('Total Neto:') }}</strong>
                                            <p>${{ number_format($entrega->totalPagar, 2) }}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cerrar') }}</button>
                                        <a class="btn btn-primary" href="{{ route('entregas.index') }}">{{ __('Atrás') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <a class="btn btn-primary" href="{{ route('entregas.index') }}">{{ __('Volver') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
