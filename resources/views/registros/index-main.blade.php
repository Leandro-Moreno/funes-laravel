@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => $title])

@section('content')
    {{ Breadcrumbs::render() }}
    <div class="container">
        <h2>{{$title}}</h2>
        <tree-subject></tree-subject>
    </div>

@endsection
