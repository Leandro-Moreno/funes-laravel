@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Registros por Tematicas')])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container">
        <h2>Registros por Tematicas</h2>
        <div class="row justify-content-center">
            @foreach($subjects as $subject)
                <a href="{{route('subject.show', $subject)}}" class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">
                            </h2>
                            <div class="card-description">
                                <h3 class="card-title">{{$subject->name}}</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p>{{$subject->registros_count}} {{__('registros')}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $subjects->links() }}
    </div>

@endsection
