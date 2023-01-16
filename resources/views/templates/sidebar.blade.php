        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand-icon p-2 mx-auto mb-0">
                <img src="{{url('/')}}/ksp/img/logo.png" width="80" class="img-fluid mx-auto rounded-circle" alt="">
            </div>
            <a class="sidebar-brand mt-0 d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
                <div class="sidebar-brand-text">KSP Tunas Muda</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('sidebar-dashboard')">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            @if(Auth::user()->hak_akses == 'admin')
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengguna
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('sidebar-nasabah')">
                <a class="nav-link " href="{{route('nasabah')}}" >
                    <i class="fas fa-fw fa-user"></i>
                    <span>Nasabah</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->hak_akses == 'admin' OR Auth::user()->hak_akses == 'pimpinan')
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item @yield('sidebar-petugas')">
                <a class="nav-link" href="{{route('petugas')}}">
                    <i class="fas fa-user-secret"></i>
                    <span>Petugas</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->hak_akses == 'admin' OR Auth::user()->hak_akses == 'pimpinan')
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi Tabungan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item @yield('sidebar-simpanan')">
                <a class="nav-link collapsed" href="{{route('simpanan')}}" >
                    <i class="fas fa-fw fa-arrow-down"></i>
                    <span>Simpanan</span>
                </a>
            </li>
            <li class="nav-item @yield('sidebar-penarikan')">
                <a class="nav-link collapsed" href="{{route('transaksi')}}">
                    <i class="fas fa-fw fa-arrow-up"></i>
                    <span>Penarikan</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->hak_akses == 'admin' OR Auth::user()->hak_akses == 'pimpinan' OR Auth::user()->hak_akses == 'kasir')

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi Pinjaman
            </div>
            @if(Auth::user()->hak_akses != 'kasir')
            <li class="nav-item @yield('sidebar-pinjaman')">
                <a class="nav-link collapsed" href="{{route('pinjaman')}}" >
                    <i class="fas fa-fw fa-hands"></i>
                    <span>Pinjaman</span>
                </a>
            </li>
            @endif
            @if(Auth::user()->hak_akses == 'pimpinan' OR Auth::user()->hak_akses == 'kasir')
            <li class="nav-item @yield('sidebar-pencairan')">
                <a class="nav-link collapsed" href="{{route('pencairan')}}" >
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Pencairan</span>
                </a>
            </li>    
            @endif
            @if(Auth::user()->hak_akses != 'kasir')
            <li class="nav-item @yield('sidebar-angsuran')">
                <a class="nav-link collapsed" href="{{route('angsuran')}}" >
                    <i class="fas fa-fw fa-th-list"></i>
                    <span>Angsuran</span>
                </a>
            </li>
            @endif
            @endif

            @if(Auth::user()->hak_akses == 'pimpinan' OR Auth::user()->hak_akses == 'kasir')
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item @yield('sidebar-jurnal')">
                <a class="nav-link" href="{{route('jurnal')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Jurnal</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item @yield('sidebar-perkiraan')">
                <a class="nav-link" href="{{route('perkiraan')}}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Akun Perkiraan</span></a>
            </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        