<!-- Navbar -->
<div class="fixed-top">
    <section class="d-none d-md-block p-1 text-white banner-top bg-dark ">
        <div class="container container-fluid menu-adm">
            <ul class="ep_tm_key_tools" id="ep_tm_menu_tools">
                <li><a href="{{ route('profile.edit') }}">Registrado como {{ Auth::user()->name}} {{Auth::user()->last_name}}</a></li>
                <li><a href="{{ route('registro.personal') }}">Manejar mis depositos</a></li>
                <li><a href="{{ route('registro.create') }}">Crear nuevo registro</a></li>
                @editor
                <li><a href="{{ route('admin.index') }}">Administración</a></li>
                @endeditor

                <li><a href="{{ route('logout') }}">Cerrar Sesión</a></li>
            </ul>
        </div>
    </section>
@include('layouts.navbars.navs.main')
<!-- End Navbar -->
</div>
