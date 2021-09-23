
@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'admin', 'title' => __('Funes - Admin')])

@section('content')
    <section>
        <div class="container" style="height: auto;">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12" >
                    <div class="col-md-12" >
                        <h2 class="card-title font-weight-bold">Administrador</h2>
                    </div>
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('register') }}">
                                    <h3 class="card-title">Administrar Usuarios</h3>
                                    <p class="card-category"></p>
                                </a>
                            </div>
                            <div class="card-body row">
                                <div class="col-sm-12">  <p>Desde acá puede administrar los usuarios registrados en la plataforma.</p>
                                </div>
                            </div>
                        </div>


                </div>

            </div>
        </div>
    </section>
@endsection
