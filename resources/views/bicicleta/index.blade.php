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
            <div class="text-center card m-1 border-2 {{ $bicicleta->estado == 'Inactiva' ? 'border-danger' : '' }}" style="width: 15rem;">    
                <img src="{{ asset('storage/' . $bicicleta->img) }}" class="card-img-top" alt="..." style="height: 200px; object-fit: cover; margin-top:10px"><br>
                <div class="card-body">
                    <h5 class="card-title">Bicicleta <span class="badge text-bg-dark">{{ $bicicleta->marca }}</span></h5>
                    <p class="card-text">PRECIO X HORA:</p>
                    <span class="badge text-bg-primary">{{ $bicicleta->precioHora }}</span><br>
                    <p class="card-text">REGIONAL SENA:</p>
                    <span class="badge text-bg-primary">{{ $bicicleta->centro->regional }}</span><br><br>
                    <div class="d-grid ">
                        <a href="{{ route('alquileres.create', ['id_bicicletas' => $bicicleta->id]) }}" class="btn btn-success">Alquilar</a><br>
                    </div>           
                    @php
                        $rol = Auth::user()->id_roles;
                        if($rol == 1){
                    @endphp
                    <form action="{{ route('bicicletas.destroy', $bicicleta->id) }}" method="POST">
                        <a class="btn btn-outline-warning btn-sm" href="{{ route('bicicletas.edit', $bicicleta->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <a class="btn btn-outline-dark btn-sm" href="{{ route('bicicletas.show', $bicicleta->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estas seguro que deseas eliminar?') ? this.closest('form').submit() : false;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                        </button>
                    </form>
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
