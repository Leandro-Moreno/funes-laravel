@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'autores', 'title' => __('Registros por Autores')])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container">
        <h2>Registros por Autores</h2>
        {{ $authors->links() }}
        <div class="row justify-content-center">
            @foreach($authors as $author)
                <a href="{{route('author.show', $author)}}" class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                            </h2>
                            <div class="card-description">
                                <h3 class="card-title">{{$author->given}} {{$author->family}}</h3>
                                <p>{{$author->email}}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p>{{$author->registros_count}} {{__('registros')}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $authors->links() }}
    </div>

@endsection
