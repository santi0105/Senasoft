@extends('layouts.app')

@section('template_title')
    Eventos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3 ">
                    <div class="card-header" style="background-color: #4CAF50; color: white;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Eventos') }}
                            </span>
                            <!-- formulario de búsqueda -->
<form action="{{ route('eventos.index') }}" method="GET" class="d-flex mb-3">
    <input type="text" name="busqueda" value="{{ $busqueda }}" class="form-control me-2" placeholder="Buscar lugar">
    
    
    <button type="submit" class="btn btn-sm btn-outline-light mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
        </svg>
                  <span class="visually-hidden">Button</span>
    </button>

    <!-- Botón para mostrar todos los eventos -->
    @if($busqueda)
        <a href="{{ route('eventos.index') }}" class="btn btn-outline-light">Mostrar Todos</a>
    @endif
</form>
                         
                                                       @php
                                                       $rol = Auth::user()->id_roles;
                                                       if($rol == 1){
                                                   @endphp
                                                    <div class="float-right">
                                                        <a href="{{ route('eventos.create') }}" class="btn btn-light btn-sm float-right"  data-placement="left">
                                                         {{ __('Crear nuevo evento') }}
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
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="row">
                            @foreach ($eventos as $evento)
                                <div class="text-center m-2 card" style="width: 18rem;">
                                    <img src="{{ asset('storage/' . $evento->img) }}" class="card-img-top mt-1" style="height: 200px; object-fit: cover; margin-top:10px">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $evento->nombreEvento }}</h5>
                                            <p class="card-text">{{ $evento->fecha }}  -  {{ $evento->hora }}</p>
                                            <p class="card-text">Lugar de Evento</p>
                                            <p class="card-text">{{  $evento->lugar }}</p><br>
                                            @php
                                                $rol = Auth::user()->id_roles;
                                                if($rol == 1){
                                            @endphp
                                            <a class="btn btn-primary" href="{{ route('asistencias.index', $evento->id) }}">Asistentes</a>
                                            @php
                                                }
                                            @endphp
                                            <a href="{{ route('asistencias.create', ['id_eventos' => $evento->id]) }}" class="btn btn-success">Asistir</a><br><br>
                                            @php
                                                $rol = Auth::user()->id_roles;
                                                if($rol == 1){
                                            @endphp
                                            <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST">
                                            <a class="btn btn-outline-warning btn-sm" href="{{ route('eventos.edit', $evento->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
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
                </div>
                {!! $eventos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
     
@endsection
