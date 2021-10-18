@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register-import', 'title' => __('Importar Registros')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Importar Registros</h4>
                            <p class="card-category"> Ultimos registros importados</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('registro.process', ['process' => 'search']) }}" class="btn btn-sm btn-primary">{{ __('Buscar en las carpetas') }}</a>
                                    <a href="{{ route('registro.process', ['process' => 'extract']) }}" class="btn btn-sm btn-primary">{{ __('Extraer') }}</a>
                                    <a href="{{ route('registro.process', ['process' => 'complete']) }}" class="btn btn-sm btn-primary">{{ __('Completo') }}</a>
                                </div>
                            </div>
                            <x-table>
                                <x-slot name="heading">
                                    <x-table.heading>ID</x-table.heading>
                                    <x-table.heading>Nombre</x-table.heading>
                                    <x-table.heading>Eprint ID</x-table.heading>
                                    <x-table.heading>Route</x-table.heading>
                                    <x-table.heading>XMl REV</x-table.heading>
                                    <x-table.heading>Status</x-table.heading>
                                </x-slot>
                                @foreach($folders as $folder)
                                    <x-table.row>
                                            <x-table.cell>{{$folder->id}}</x-table.cell>
                                            <x-table.cell>{{isset($folder->register->title)?$folder->register->title:"Sin agregar nombre aún"}}</x-table.cell>
                                            <x-table.cell>{{$folder->eprintid}}</x-table.cell>
                                            <x-table.cell>{{$folder->route}}</x-table.cell>
                                            <x-table.cell>{{$folder->xmlRevision}}</x-table.cell>
                                            <x-table.cell url="{{ route('registro.index', $folder->register) }}">
                                                {{$folder->status()}}
                                            </x-table.cell>
                                    </x-table.row>
                                @endforeach
                            </x-table>
                            {{ $folders->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
