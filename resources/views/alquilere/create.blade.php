@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Alquiler
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="text-center row justify-content-center">
            <div class="col-md-6">
                <div class="mt-4 card">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <h5>{{ __('Realizar un Alquiler') }}</h5>
                    </div>
                    <div class="card-body d-flex flex-column align-items-center">
                        <form method="POST" action="{{ route('alquileres.store') }}" role="form" enctype="multipart/form-data" class="w-100">
                            @csrf

                            @include('alquilere.form')
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
