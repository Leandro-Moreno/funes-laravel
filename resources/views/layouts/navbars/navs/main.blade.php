<nav class="navbar navbar-expand-lg bg-primary navbar-absolutetext-white">
    <div class="container">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="{{ route('home') }}"><img height="45px" style="fill:white;"
                                                                    src="{{ asset('material/img/logoFunes.png') }}"/></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('registro.index') }}" class="nav-link">
                        <i class="material-icons">dashboard</i> {{ __('Registros') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('subject.index') }}" class="nav-link">
                        <i class="material-icons">dashboard</i> {{ __('Término Clave') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('author.index') }}" class="nav-link">
                        <i class="material-icons">dashboard</i> {{ __('Autor') }}
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
                    <a href="{{ route('editorial') }}" class="nav-link">
                        <i class="material-icons">person_add</i> {{ __('Editorial') }}
                    </a>
                </li>
                <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
                    <a href="{{ route('year') }}" class="nav-link">
                        <i class="material-icons">fingerprint</i> {{ __('Año') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
