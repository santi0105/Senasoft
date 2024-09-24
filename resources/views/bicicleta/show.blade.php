@extends('layouts.app')

@section('template_title')
    {{ $bicicleta->name ?? __('Show') . " " . __('Bicicleta') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Bicicleta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('bicicletas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Img:</strong>
                                    {{ $bicicleta->img }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Marca:</strong>
                                    {{ $bicicleta->marca }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Color:</strong>
                                    {{ $bicicleta->color }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Estado:</strong>
                                    {{ $bicicleta->estado }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Preciohora:</strong>
                                    {{ $bicicleta->precioHora }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Id Centros:</strong>
                                    {{ $bicicleta->id_centros }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
