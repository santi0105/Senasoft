@extends('layouts.app')

@section('template_title')
    Alquileres
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Alquileres') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('alquileres.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>

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
                                        
									<th >Fechainicial</th>
									<th >Fechafinal</th>
									<th >Tpalquiler</th>
									<th >IBicicletas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alquileres as $alquilere)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $alquilere->fechaInicial }}</td>
										<td >{{ $alquilere->fechaFinal }}</td>
										<td >{{ $alquilere->tpAlquiler }}</td>
										<td >{{ $alquilere->bicicleta->marca }}</td>

                                            <td>
                                                <form action="{{ route('alquileres.destroy', $alquilere->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('alquileres.show', $alquilere->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('alquileres.edit', $alquilere->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('entregas.create', $alquilere->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Entregar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $alquileres->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
