<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class="fas fa-home"></i><span>Inicio</span>
    </a>
    @can('ver-usuario')
        <a class="nav-link" href="/usuarios">
            <i class="fas fa-users"></i><span>Usuarios</span>
        </a>
    @endcan
    @can('ver-rol')
        <a class="nav-link" href="/roles">
            <i class="fas fa-user-lock"></i><span>Roles</span>
        </a>   
    @endcan
    @can('ver-proyecto')
        <a class="nav-link" href="/proyectos">
            <i class="fas fa-user-lock"></i><span>Proyectos</span>
        </a>   
    @endcan
    @can('ver-programa')
        <a class="nav-link" href="/programas">
            <i class="fas fa-book"></i><span>Programas de formación</span>
        </a>
    @endcan
</li>
