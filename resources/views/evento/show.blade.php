@extends('layouts.app')

@section('template_title')
    {{ $evento->name ?? __('Show') . " " . __('Evento') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="text-center row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <div class="float-left">
                            <span class="card-title">{{ __('') }} Evento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-light btn-sm" href="{{ route('eventos.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Evento:</strong>
                                    {{ $evento->nombreEvento }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha:</strong>
                                    {{ $evento->fecha }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Hora:</strong>
                                    {{ $evento->hora }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lugar:</strong>
                                    {{ $evento->lugar }}
                                </div>

                                <a class="btn btn-primary" href="{{ route('asistencias.index', $evento->id) }}">Asistentes</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
