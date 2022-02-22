@extends('layouts.app-registro', [
    'class' => 'off-canvas-sidebar',
     'activePage' => 'registro',
      'title' => __('Funes - ').$registro->title,
      'canonical' => route('registro.show', $registro),
      ])

@section('content')
<registro-index :registro='@json( $registro )'></registro-index>
{{$registro}}
@endsection
