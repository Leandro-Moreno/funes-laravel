@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Página Inicial de Funes')])

@section('content')
<section>
  <div class="container" style="height: auto;">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12" >
        <div class="col-md-12" >
          <h2 class="card-title font-weight-bold">Página Inicial de Funes</h2>
        </div>
        @guest()
        <div class="card">
          <div class="card-header">
            <a href="{{ route('register') }}">
              <h3 class="card-title">Ventajas de Ser un Usuario Registrado</h3>
              <p class="card-category"></p>
            </a>
          </div>
          <div class="card-body row">
              <div class="col-sm-12">  <p>Los usuarios registrados pueden proponer documentos para su publicación, guardar búsquedas de su interés y recibir información (por correo electrónico y RSS) cuando se publiquen nuevos documentos que satisfagan esas búsquedas.</p>
              </div>
            </div>
        </div>
        @endguest()
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Registros Recientes</h3>
            <p class="card-category"></p>
          </div>
          <div class="card-body row">
              <div class="col-sm-12">  <p>Registros publicados en Funes durante la última semana.</p>
              </div>
            </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Búsqueda Avanzada</h3>
            <p class="card-category"></p>
          </div>
          <div class="card-body row">
              <div class="col-sm-12">  <p>Realizar búsquedas complejas utilizando información múltiple sobre los registros existentes. Utilice el campo de búsqueda en la parte superior de la página para una búsqueda rápida.</p>
              </div>
            </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Estructura de Funes por Términos Claves</h3>
            <p class="card-category"></p>
          </div>
          <div class="card-body row">
              <div class="col-sm-12">  <p>Presentación del contenido de Funes organizada con la estructura de sus términos clave.</p>
              </div>
            </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Acerca de Funes</h3>
            <p class="card-category"></p>
          </div>
          <div class="card-body row">
              <div class="col-sm-12">  <p>Políticas de uso de los registros de Funes.
</p>
              </div>
            </div>
        </div>

      </div>

    </div>
  </div>
</section>
@endsection
