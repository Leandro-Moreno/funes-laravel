@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'registro', 'title' => __('Registros')])

@section('content')
<registro-index :registroprop='@json( $registro )'></registro-index>
leandro
@endsection
