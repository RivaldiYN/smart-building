<!-- Sidebar Menu -->
@if (auth()->user()->roles_id == 1)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link text-white">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/" class="nav-link text-white">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Ruangan
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/ruangan/" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Ruangan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/ruangan/create/" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data Ruangan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fa fa-lightbulb-o"></i>
                    <p>
                        Device
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/device/" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Device</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/device/create/" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data Devices</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/user/" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/user/create/" class="nav-link text-white">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tambah Data User</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
                <a href="" class="nav-link text-white"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endif

<!-- /.sidebar-menu -->
