@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Registros por año')])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container">
        <h2 style="
        font-family: 'Dax';
        font-weight: 500;
        margin-bottom: 0.75rem;
        color: rebeccapurple!important"
        >Registros por año</h2>
        <div class="row justify-content-center">
            @foreach($years as $year)
            <a href="{{route('year.show', ['year' => isset($year->date_year)?$year->date_year:__("Sin especificar")])}}" class="col-md-2 col-sm-4">
                <div class="card" style="margin-top:10px; margin-bottom:10px;">
                    <div class="card-header">
                        <h2 class="card-title" style="
                        font-family: 'Dax';
                        font-weight: 500;
                        margin-bottom: 0.75rem;
                        color: rebeccapurple!important">
                            {{isset($year->date_year)?$year->date_year:__("Sin especificar")}}
                        </h2>
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
