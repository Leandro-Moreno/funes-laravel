
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'admin', 'title' => config('app.name') . __(' - Mis ultimos Registros')])

@section('content')
    <div class="container-fluid">
        <section>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">article</i>
                        </div>
                        <h4 class="card-title">{{__('Mis Ultimos Registros')}}</h4>
                        <p class="card-category">{{__('Mis últimos registros')}}</p>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('registro.create') }}" class="btn btn-sm btn-primary">{{ __('Nuevo registro') }}</a>
                            </div>
                        </div>
                        <x-table>
                            <x-slot name="heading">
                                <x-table.heading>Eprint ID</x-table.heading>
                                <x-table.heading>Nombre</x-table.heading>
                                <x-table.heading>Fecha de creación</x-table.heading>
                                <x-table.heading>Status</x-table.heading>
                                <x-table.heading>Edición</x-table.heading>
                            </x-slot>
                            @foreach($registros as $registro)
                                <x-table.row>
                                    <x-table.cell>{{$registro->eprintid}}</x-table.cell>
                                    <x-table.cell>{{isset($registro->title)?$registro->title:"Sin agregar nombre aún"}}</x-table.cell>
                                    <x-table.cell>{{$registro->created_at}}</x-table.cell>
                                    <x-table.cell>
                                        {{$registro->eprint_status}}
                                    </x-table.cell>
                                    <x-table.cell>
                                        <a class="btn btn-sm btn-success" href="{{ route('registro.edit', $registro) }}">Editar</a>
                                        <a class="btn btn-sm btn-warning" href="{{ route('registro.show', $registro) }}">Ver</a>
                                    </x-table.cell>
                                </x-table.row>
                            @endforeach
                        </x-table>
                    </div>
                </div>
                {{$registros->links()}}
            </div>
        </section>
    </div>
@endsection
