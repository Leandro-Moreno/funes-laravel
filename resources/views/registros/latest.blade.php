@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => $title])

@section('content')
    {{ Breadcrumbs::render() }}
    <registro-latest></registro-latest>


@endsection
