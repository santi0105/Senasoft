@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Alquilere
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Crear Alquiler') }}</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('alquileres.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('alquilere.form')
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
