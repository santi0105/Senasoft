@extends('layouts.app')

@section('template_title')
    Bicicletas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Bicicletas') }}
                            </span>
                            
                            @php
                                $rol = Auth::user()->id_roles;
                                if($rol == 1){
                            @endphp
                             <div class="float-right">
                                <a href="{{ route('bicicletas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Añadir Nueva Bicicleta') }}
                                </a>
                              </div>
                            @php
                                }else{
                            @endphp
                                    <input type="hidden">
                            @php
                                }
                            @endphp
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-succe>
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="row m-4">
        @foreach ($bicicletas as $bicicleta)
            <div class="card m-1" style="width: 18rem;">
                <img src="{{ asset('storage/' . $bicicleta->img) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bicicleta->marca }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ route('alquileres.create', ['id_bicicletas' => $bicicleta->id]) }}" class="btn btn-primary">Alquilar</a>
                        @php
                            $rol = Auth::user()->id_roles;
                            if($rol == 1){
                        @endphp
                            <a class="btn btn-sm btn-success" href="{{ route('bicicletas.edit', $bicicleta->id) }}">                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg> {{ __('Editar Bicicleta') }}</a>

                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estas seguro que deseas eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                        @php
                            }else{
                        @endphp
                                <input type="hidden">
                        @php
                            }
                        @endphp
                        </div>
            </div>
        @endforeach   
    </div>
                </div>
                {!! $bicicletas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
    
@endsection
