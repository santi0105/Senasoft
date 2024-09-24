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
        </div>
    </section>
@endsection
