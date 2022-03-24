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
                            <p class="badge badge-black">{{$author->registros_count}} {{__('registros')}}</p>
                        </div>
                        <div class="card-body">
                            <h3 class="car">{{$author->family}}, {{$author->given}}</h3>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $authors->links() }}
    </div>

@endsection
