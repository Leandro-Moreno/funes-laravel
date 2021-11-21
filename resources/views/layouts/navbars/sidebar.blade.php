<div class="sidebar" data-color="primary" data-background-color="grey">
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Administración') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'personal' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registro.personal') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Manejar mis depositos') }}</p>
                </a>
            </li>
            @editor
            <li class="nav-item{{ $activePage == 'registro-admin' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registro.admininistrator.index') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Administrar los registros') }}</p>
                </a>
            </li>
            @endeditor
            @administrator
            <li class="nav-item{{ $activePage == 'registro-import' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registro.process') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Importar registros') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'registro-import' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registro.process') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Importar usuarios') }}</p>
                </a>
            </li>
            @endadministrator

            <li class="nav-item bg-black">
                <a class="nav-link text-white" href="{{ route('registro.create') }}">
                    <i class="material-icons">article</i>
                    <p>{{ __('Crear un nuevo registro') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
