@extends('layouts.app')

@section('template_title')
    {{ $alquilere->name ?? __('Show') . " " . __('Alquilere') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Alquilere</span>
                        </div>
                        <div class="float-left">
                            <a class="btn btn-primary btn-sm" href="{{ route('entregas.create') }}"> {{ __('Confirmar Entrega') }}</a>
                            @foreach ($alquileres as $alquilere)
                                <a class="btn btn-sm btn-success" href="{{ route('entregas.create', $alquilere->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Confirrrr') }}</a>
                            @endforeach 
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('alquileres.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechainicial:</strong>
                                    {{ $alquilere->fechaInicial }}
                                    {{ $alquilere->user->id}}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fechafinal:</strong>
                                    {{ $alquilere->fechaFinal }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Tpalquiler:</strong>
                                    {{ $alquilere->tpAlquiler }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Users:</strong>
                                    {{ $alquilere->id_users }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Bicicletas:</strong>
                                    {{ $alquilere->id_bicicletas }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
