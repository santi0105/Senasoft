@extends('layouts.app')

@section('template_title')
    {{ $entrega->name ?? __('Show') . " " . __('Entrega') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Entrega</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('entregas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Alquileres:</strong>
                                    {{ $entrega->id_alquileres }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Valorpagar:</strong>
                                    {{ $entrega->valorPagar }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tarifaadicional:</strong>
                                    {{ $entrega->tarifaAdicional }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
