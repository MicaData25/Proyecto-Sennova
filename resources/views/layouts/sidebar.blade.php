<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.png') }}" width="65" alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ Request::is('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fire"></i> <span>Inicio</span>
            </a>
        </li>

        <li class="menu-header">Gestión</li>
        <li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('usuarios.index') }}">
                <i class="fas fa-users"></i> <span>Usuarios</span>
            </a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="fas fa-user-shield"></i> <span>Roles</span>
            </a>
        </li>
        <li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('proyectos.index') }}">
                <i class="fas fa-project-diagram"></i> <span>Proyectos</span>
            </a>
        </li>
        <li class="{{ Request::is('programas*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('programas.index') }}">
                <i class="fas fa-graduation-cap"></i> <span>Programas de Formación</span>
            </a>
        </li>
    </ul>
</aside>
