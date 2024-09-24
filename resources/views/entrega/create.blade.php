@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Entrega
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Entrega</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('entregas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('entrega.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
