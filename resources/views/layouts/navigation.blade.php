<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    @if(auth::user()->role_id == 1)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                        System management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('management.show') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Course</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('room') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Rooms</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('section') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Section</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Enrollment
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('dashboard.enrollment') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('application.form') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Application form</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('enrolled.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Enrolled</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Finance
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('finance.show') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('finance.accountability') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Accountabilities</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('finance.event') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add event</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        @elseif (auth::user()->role_id == 2)
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('student.dashboard.show') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('get.enrolled') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        {{ __('Enrolled subject') }}
                    </p>
                </a>
            </li>
        </ul>
        @endif
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
