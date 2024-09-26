@extends('layouts.app')

@section('template_title')
    Asistencias
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asistencias') }}
                            </span>

                            <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('eventos.index') }}"> {{ __('Atrás') }}</a>
                        </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Asistencia</th>
									<th >Nombre</th>
									<th >Apellido</th>
									<th >Regional</th>
									<th >Evento a Participar</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asistencias as $asistencia)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $asistencia->asiste }}</td>
										<td >{{ $asistencia->user->name }}</td>
                                        <td >{{ $asistencia->user->apellido }}</td>
                                        <td >{{ $asistencia->user->regional }}</td>
										<td >{{ $asistencia->evento->nombreEvento }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asistencias->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
