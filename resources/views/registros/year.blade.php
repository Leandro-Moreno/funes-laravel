@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Registros por año')])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container">
        <h2>Registros por año</h2>
        <div class="row justify-content-center">
            @foreach($years as $year)
            <a href="{{route('year.show', ['year' => isset($year->date_year)?$year->date_year:__("Sin especificar")])}}" class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                        </h2>
                        <div class="card-description">
                            <h3 class="card-title">{{isset($year->date_year)?$year->date_year:__("Sin especificar")}}</h3>
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
