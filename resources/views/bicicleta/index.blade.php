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

                             <div class="float-right">
                                <a href="{{ route('bicicletas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Img</th>
									<th >Marca</th>
									<th >Color</th>
									<th >Estado</th>
									<th >Preciohora</th>
									<th >Id Centros</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bicicletas as $bicicleta)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $bicicleta->img }}</td>
										<td >{{ $bicicleta->marca }}</td>
										<td >{{ $bicicleta->color }}</td>
										<td >{{ $bicicleta->estado }}</td>
										<td >{{ $bicicleta->precioHora }}</td>
										<td >{{ $bicicleta->id_centros }}</td>

                                            <td>
                                                <form action="{{ route('bicicletas.destroy', $bicicleta->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('bicicletas.show', $bicicleta->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('bicicletas.edit', $bicicleta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $bicicletas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
