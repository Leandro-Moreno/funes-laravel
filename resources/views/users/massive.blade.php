@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'user_massive', 'title' => __('Cargar Usuarios masivamente')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('user.import') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Cargar Usuarios Masivamente') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Volver a la lista de usuarios') }}</a>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-usuarios">{{ __('usuarios') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-control-file">
                                            <input class="form-control-file" name="usuarios" id="input-usuarios" type="file" required value="{{ old('usuarios') }}"  accept=".xlsx"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Añadir usuarios') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
