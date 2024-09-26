@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Entrega
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="text-center row justify-content-center">
            <div class="col-md-4">

                <div class="mt-4 card card-default">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <span class="card-title">{{ __('Confirmar') }} Entrega</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('entregas.store', $entrega->id) }}"  role="form" enctype="multipart/form-data">   
                        @csrf

                            @include('entrega.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
