
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => 'Error 401'])

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{__('No autorizado')}}</h2>
        </div>

    </div>
@endsection
