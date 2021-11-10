@include('layouts.navbars.navs.auth')
<div class="wrapper wrapper-full-page">
  <div style=" background-size: cover; background-position: top center;align-items: center;">
    @yield('content')
     @include('layouts.footers.guest')
  </div>
</div>
