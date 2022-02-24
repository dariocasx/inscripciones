<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    Escritorio
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        Administración de usuarios
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    Permisos
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    Roles
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    Usuarios
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('teacher_access')
                <li class="nav-item">
                    <a href="{{ route("admin.teachers.index") }}" class="nav-link {{ request()->is('admin/teachers') || request()->is('admin/teachers/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-book-open nav-icon">

                        </i>
                        Profesor
                    </a>
                </li>
            @endcan
            @can('course_access')
                <li class="nav-item">
                    <a href="{{ route("admin.courses.index") }}" class="nav-link {{ request()->is('admin/courses') || request()->is('admin/courses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-certificate nav-icon">

                        </i>
                        Cursos
                    </a>
                </li>
            @endcan
            @can('enrollment_access')
                <li class="nav-item">
                    <a href="{{ route("admin.enrollments.index") }}" class="nav-link {{ request()->is('admin/enrollments') || request()->is('admin/enrollments/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-highlighter nav-icon">

                        </i>
                        Inscripción
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    Salir
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>