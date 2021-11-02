@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Funes - ').$registro->title])

@section('content')
<registro-index :registro='@json( $registro )'></registro-index>
{{$registro;}}
@endsection
