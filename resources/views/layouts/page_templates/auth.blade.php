@include('layouts.navbars.navs.auth')
<div class="wrapper wrapper-full-page">
  <div class="page--min-size" style=" background-size: cover; background-position: top center;align-items: center;">
    @yield('content')
     @include('layouts.footers.guest')
  </div>
</div>
