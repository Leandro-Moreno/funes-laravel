@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => $title])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container">
        <h2>{{$title}}</h2>
        {{ $registros->links() }}
        <tree-subject></tree-subject>
        <div class="row justify-content-center">
            @foreach($registros as $registro)
            <a href="{{ route('registroid', $registro) }}" class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                        </h2>
                        <div class="card-description">
                            <h3 class="card-title">{{$registro->title}}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">Código id</div>
                            <div class="col-md-8">{{$registro->eprintid}}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Autores</div>
                            <div class="col-md-8">
                                @foreach($registro->authors as $author)
                                    {{$author->given}} {{$author->family}}
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="featured-content-info">
                                <div class="title title-white">Ver más</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        {{ $registros->links() }}
    </div>

@endsection
