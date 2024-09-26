@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Asistencia
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="text-center row justify-content-center">
            <div class=" col-md-6">

                <div class="card mt-3 card-default">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <span class="card-title">{{ __('Registrar') }} Asistencia</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('asistencias.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('asistencia.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
