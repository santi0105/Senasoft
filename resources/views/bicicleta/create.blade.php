@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Bicicleta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="text-center row justify-content-center">
            <div class=" col-md-6">

                <div class="card mt-3 card-default">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <span class="card-title">{{ __('Añadir') }} Bicicleta</span>
                        <div class="float-right">
                            <a class="btn btn-light btn-sm" href="{{ route('bicicletas.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                    </div>
                    <div class="text-center card-body bg-white">
                        <form method="POST" action="{{ route('bicicletas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('bicicleta.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
