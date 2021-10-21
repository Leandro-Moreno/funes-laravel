@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Registros')])

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach($registros as $registro)
            <a href="{{route('year.show', ['year' => isset($registro->date_year)?$registro->date_year:"empty"])}}" class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                        </h2>
                        <div class="card-description">
                            <h3 class="card-title">{{isset($registro->date_year)?$registro->date_year:__("Sin especificar")}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

@endsection
