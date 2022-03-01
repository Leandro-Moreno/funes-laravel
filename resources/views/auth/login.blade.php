@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Inicio de sesión - ').config('app.name')])

@section('content')
    <div class="container" style="height: auto;">
        <div class="row align-items-center">
            <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
                <h3>{{ __('Acá puede ir un texto.') }} </h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="card card-login card-hidden mb-3">
                        <div class="card-header card-header-black text-center">
                            <h3 class="card-title"><strong>{{ __('Inicio de sesión') }}</strong></h3>
                        </div>
                        <div class="card-body">
                            <p class="card-description text-center">{{ __('Por favor, introduzca su nombre de usuario y contraseña.') }}  </p>
                            <div class="bmd-form-group{{ $errors->has('username') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">account_circle</i>
                  </span>
                                    </div>
                                    <input type="username" name="username" class="form-control"
                                           placeholder="{{ __('Nombre de usuario...') }}"
                                           value="{{ old('username') }}" required>
                                </div>
                                @if ($errors->has('username'))
                                    <div id="username-error" class="error text-danger pl-3" for="username"
                                         style="display: block;">
                                        <strong>{{ $errors}}</strong>
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control"
                                           placeholder="{{ __('Password...') }}"
                                           value="{{ !$errors->has('password') ? "secret" : "" }}" required>
                                </div>
                                @if ($errors->has('password'))
                                    <div id="password-error" class="error text-danger pl-3" for="password"
                                         style="display: block;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-check mr-auto ml-3 mt-3">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuerdame') }}
                                    <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer row ">
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-dark">
                                        <smsall>{{ __('¿Olvidó la contraseña?') }}</smsall>
                                    </a>
                                @endif
                            </div>
                            <div class="col-6 text-right">
                                <button type="submit"
                                        class="btn btn-primary btn-lg ">{{ __('Ingresar') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">

                    <div class="col-12 text-right">
                        <a href="{{ route('register') }}" class="btn btn-outline-danger btn-lg">
                            <small>{{ __('Crear nueva cuenta') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
