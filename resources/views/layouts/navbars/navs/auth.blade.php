<!-- Navbar -->
<div class="fixed-top">
    <section class="d-none d-md-block p-1 text-white banner-top bg-dark ">
        <div class="container container-fluid menu-adm">
            <ul class="ep_tm_key_tools" id="ep_tm_menu_tools">
                <li><a href="{{ route('register') }}">Registrado como {{ Auth::user()->name}} {{Auth::user()->last_name}}</a></li>
                <li><a href="{{ route('register') }}">Manejar mis depositos</a></li>
                <li><a href="{{ route('login') }}">Perfil</a></li>
                @administrator
                <li><a href="{{ route('admin.index') }}">Administración</a></li>
                @endadministrator
                <li><a href="{{ route('login') }}">Cerrar Sesión</a></li>
            </ul>
        </div>
    </section>
@include('layouts.navbars.navs.main')
<!-- End Navbar -->
</div>
