@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => $title])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container-fluid">
        <div class="row">
            <h2 class="col-md-8">{{$title}}</h2>
            <div class="col-md-4">
                <a href="{{route('registro.create')}}" class="btn btn--library btn--round-lg">Agregar un registro</a>
            </div>
        </div>
        <tree-subject></tree-subject>
    </div>

@endsection
