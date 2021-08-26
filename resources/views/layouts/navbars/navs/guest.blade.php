<!-- Navbar -->
<div class="fixed-top">
   <section class="d-none d-md-block p-1 text-white banner-top bg-dark ">
      <div class="container container-fluid menu-adm">
         <ul class="ep_tm_key_tools" id="ep_tm_menu_tools">
            <li><a href="{{ route('register') }}">Registro</a></li>
            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
         </ul>
      </div>
   </section>
    @include('layouts.navbars.navs.main')
   <!-- End Navbar -->
</div>
