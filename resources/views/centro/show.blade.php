@extends('layouts.app')

@section('template_title')
    {{ $centro->name ?? __('Show') . " " . __('Centro') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Centro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('centros.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $centro->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Regional:</strong>
                                    {{ $centro->regional }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Latitud:</strong>
                                    {{ $centro->latitud }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Longitud:</strong>
                                    {{ $centro->longitud }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
