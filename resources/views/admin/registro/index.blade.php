@extends('layouts.app', ['class' => 'registro-admin', 'activePage' => 'admin', 'title' => __('Administrator Registro')])

@section('content')
    <div class="container">
        <section>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">article</i>
                        </div>
                        <h4 class="card-title">{{__('Administrador de Registros')}}</h4>
                        <p class="card-category">Este es el administrador de registros</p>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                @administrator
                                <a href="{{ route('registro.process') }}"
                                   class="btn btn-danger">{{ __('Importar Registros') }}</a>
                                @endadministrator
                            </div>
                            <form class="col-md-12 row" method="GET">
                                <div class="col-md-12 row">
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="filter" class="col-form-label">Filter</label>--}}
{{--                                            <input type="text" class="form-control" id="filter" name="filter"--}}
{{--                                                   placeholder="Product name..." value="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-4">
                                        <h3>Status Registro</h3>
                                        <div class="form-check">
                                            <input class="btn-check" type="radio" name="eprint_status" id="eprint_status1" value="" {{ (old("eprint_status") == "" ? "checked":"") }}>
                                            <label class="form-check-label" for="eprint_status1">Todos</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="btn-check" type="radio" name="eprint_status" id="eprint_status2" value="archive" {{ (old("eprint_status") == "archive" ? "checked":"") }}>
                                            <label class="form-check-label" for="eprint_status2">Público</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="btn-check" type="radio" name="eprint_status" id="eprint_status3" value="deletion" {{ (old("eprint_status") == "deletion" ? "checked":"") }}>
                                            <label class="form-check-label" for="eprint_status3">Borrado</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="btn-check" type="radio" name="eprint_status" id="eprint_status4" value="inbox" {{ (old("eprint_status") == "inbox" ? "checked":"") }}>
                                            <label class="form-check-label" for="eprint_status4">Archivado</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-dark active mb-2">Filtrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <x-table>
                            <x-slot name="heading">
                                <x-table.heading>Eprint ID</x-table.heading>
                                <x-table.heading>ID</x-table.heading>
                                <x-table.heading>Nombre</x-table.heading>
                                <x-table.heading>Abstract</x-table.heading>
                                <x-table.heading>Fecha de creación</x-table.heading>
                                <x-table.heading>Status</x-table.heading>
                            </x-slot>
                            @foreach($registros as $registro)
                                <x-table.row>
                                    <x-table.cell>{{$registro->eprintid}}</x-table.cell>
                                    <x-table.cell>{{$registro->id}}</x-table.cell>
                                    <x-table.cell>{{isset($registro->title)?$registro->title:"Sin agregar nombre aún"}}</x-table.cell>
                                    <x-table.cell>{{Str::of($registro->abstract)->limit(128)}}</x-table.cell>
                                    <x-table.cell>{{$registro->created_at}}</x-table.cell>
                                    <x-table.cell>
                                        <a class="btn btn-sm btn-info" href="{{ route('registro.index', $registro) }}">{{__('VER')}}</a>
                                        <a class="btn btn-sm btn-warning" href="{{ route('registro.edit', $registro) }}">{{__('Editar')}}</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('registro.edit', $registro) }}">{{__('Aprobar')}}</a>
                                    </x-table.cell>
                                </x-table.row>
                            @endforeach
                        </x-table>
                        {{$registros->links()}}
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
