
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => 'Error 401'])

@section('content')
    @section('title', __('Unauthorized'))
    @section('code', '401')
    @section('message', __('Unauthorized'))
@endsection
