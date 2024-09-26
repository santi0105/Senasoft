<!-- Estructura basica de Laravel para no quemar codigo y simplemente llamarlo -->
@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Alquilere
@endsection

<!-- Contenido de la pagina que mostraremos (Contenido Html y PHP) -->
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Alquilere</span>
                    </div>
                    <div class="card-body bg-white">
                        <!-- Para el manejo de este formulario tambien nos traeremos el id, ya que estamos hablando de editar. En lenguaje Laravel usamos el method PATCH e incluimos el formulario y asi evitamos quemadera de codigo -->
                        <form method="POST" action="{{ route('alquileres.update', $alquilere->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('alquilere.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
