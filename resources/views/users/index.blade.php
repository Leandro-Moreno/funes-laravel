
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'admin', 'title' => __('Funes - Admin')])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __('Usuario') }}</h4>
                        <p class="card-category"> {{ __('Aquí puedes administrar usuarios') }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>{{ session('status') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar usuario') }}</a>
                            </div>
                            <div class="col-12 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Cargar Usuarios') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class=" text-primary">
                                <th>
                                    {{ __('Username') }}
                                </th>
                                <th>
                                    {{ __('Nombres y Apellidos') }}
                                </th>
                                <th>
                                    {{ __('Email') }}
                                </th>
                                <th>
                                    {{ __('Rol') }}
                                </th>
                                <th>
                                    {{ __('Organización') }}
                                </th>
                                <th>
                                    {{ __('Fecha de creación') }}
                                </th>
                                <th>
                                    {{ __('Fecha de actualización') }}
                                </th>
                                <th class="text-right">
                                    {{ __('Acciones') }}
                                </th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->username }}
                                        </td>
                                        <td>
                                            {{ $user->name }} {{ $user->last_name }} {{ $user->apellido2 }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->role_id }}
                                        </td>
                                        <td>
                                            {{ $user->organization }}
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            {{ $user->updated_at }}
                                        </td>

                                        <td class="td-actions text-right">


                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
