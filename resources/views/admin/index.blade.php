
@extends('layouts.app-administrator', ['class' => 'off-canvas-sidebar', 'activePage' => 'dashboard', 'title' => config('app.name') . __(' - Administrador')])

@section('content')
<div class="container">
    <section>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">article</i>
                        </div>
                        <p class="card-category">Registros</p>
                        <h3 class="card-title">{{$registroArchiveCount}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Desde el inicio. {{$registroCompleteCount - $registroArchiveCount}} registros no se han publicado.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <p class="card-category">Usuarios</p>
                        <h3 class="card-title">{{$userCount}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> Desde el inicio
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Fixed Issues</p>
                        <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i> Tracked from Github
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Followers</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-icon">
                            <i class="material-icons">article</i>
                        </div>
                        <h4 class="card-title">{{__('Ultimos Registros')}}</h4>
                        <p class="card-category">Estos son los ultimos 5 registros creados</p>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('registro.create') }}" class="btn btn-sm btn-primary">{{ __('Nuevo registro') }}</a>
                                @administrator
                                <a href="{{ route('registro.process') }}" class="btn btn-sm btn-danger">{{ __('Importar Registros') }}</a>
                                @endadministrator
                                @editor
                                <a href="{{ route('registro.admininistrator.index') }}" class="btn btn-sm btn-black">{{ __('Todos los Registros') }}</a>
                                @endeditor
                            </div>
                        </div>
                        <x-table>
                            <x-slot name="heading">
                                <x-table.heading>ID</x-table.heading>
                                <x-table.heading>Nombre</x-table.heading>
                                <x-table.heading>Eprint ID</x-table.heading>
                                <x-table.heading>Fecha de creación</x-table.heading>
                                <x-table.heading>Status</x-table.heading>
                                <x-table.heading>Edición</x-table.heading>
                            </x-slot>
                            @foreach($registros as $registro)
                                <x-table.row>
                                    <x-table.cell>{{$registro->id}}</x-table.cell>
                                    <x-table.cell>{{isset($registro->title)?$registro->title:"Sin agregar nombre aún"}}</x-table.cell>
                                    <x-table.cell>{{$registro->eprintid}}</x-table.cell>
                                    <x-table.cell>{{$registro->created_at}}</x-table.cell>
                                    <x-table.cell url="{{ route('registro.show', $registro) }}">
                                        <i class="material-icons">info</i>{{$registro->eprint_status}}
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
            </div>
    </section>
    <section>

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-success">
                    <div class="card-icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <h4 class="card-title">{{__('Ultimos Usuarios')}}</h4>
                    <p class="card-category">Estos son los ultimos 5 usuarios registrados</p>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            @administrator
                            <a href="{{ route('user.import') }}" class="btn btn-danger">{{ __('Importar Usuarios') }}</a>
                            @endadministrator
                            <a href="{{ route('user.index') }}" class="btn btn-primary">{{ __('Todos los Usuarios') }}</a>
                        </div>
                    </div>
                    <x-table>
                        <x-slot name="heading">
                            <x-table.heading>ID</x-table.heading>
                            <x-table.heading>Nombre</x-table.heading>
                            <x-table.heading>Apellido</x-table.heading>
                            <x-table.heading>Mail</x-table.heading>
                            <x-table.heading>Organización</x-table.heading>
                            <x-table.heading>Acciones</x-table.heading>
                        </x-slot>
                        @foreach($usuarios as $usuario)
                            <x-table.row>
                                <x-table.cell>{{$usuario->id}}</x-table.cell>
                                <x-table.cell>{{$usuario->name}}</x-table.cell>
                                <x-table.cell>{{$usuario->last_name}}</x-table.cell>
                                <x-table.cell>{{$usuario->email}}</x-table.cell>
                                <x-table.cell>{{$usuario->organization}}</x-table.cell>
                                <x-table.cell url="{{ route('user.index', $usuario) }}">
                                    <i class="material-icons">info</i>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
