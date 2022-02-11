@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => $title])

@section('content')
    {{ Breadcrumbs::render() }}
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4" style="background-color: rebeccapurple">
                    <h2>{{$title}}</h2>
                    {{ $registros->links() }}
                </div>

                <div class="col-md-8">
                    <div class="row justify-content-center">
                        @foreach($registros as $registro)
                            <a href="{{ route('registroid', $registro) }}" class="col">
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
                                                    {{$author->family}}, {{$author->given}}
                                                    @if($loop->last)
                                                        // at last loop, code here
                                                    @endif
                                                    @else
                                                        @endelse
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
                </div>
            </div>
        </div>
    </section>


@endsection
