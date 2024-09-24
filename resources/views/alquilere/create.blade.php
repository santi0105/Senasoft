@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Alquilere
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Alquilere</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('alquileres.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('alquilere.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
