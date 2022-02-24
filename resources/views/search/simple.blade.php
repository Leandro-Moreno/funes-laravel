@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => "Funes - Búsqueda Simple - " . $query])

@section('content')
    <span>hola</span>
    <search-simple query="{{$query}}"></search-simple>


@endsection
