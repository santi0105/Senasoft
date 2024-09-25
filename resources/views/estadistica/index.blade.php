@extends('layouts.app')

@section('template_title')
    Estadisticas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estadisticas') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estadisticas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >Id Alquileres</th>
									<th >Id Entregas</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estadisticas as $estadistica)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $estadistica->id_alquileres }}</td>
										<td >{{ $estadistica->id_entregas }}</td>

                                            <td>
                                                <form action="{{ route('estadisticas.destroy', $estadistica->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('estadisticas.show', $estadistica->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('estadisticas.edit', $estadistica->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                        <div class="card-body">

                            <h1>{{ $chart->options['chart_title'] }}</h1>
                            {!! $chart->renderHtml() !!}
        
                        </div>
                    </div>
                </div>
                {!! $estadisticas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}
@endsection
