@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Edición del Registro ') ])

@section('content')
    <registro-crear :data="{{$registro}}"> </registro-crear>
    {{$registro}}
@endsection
