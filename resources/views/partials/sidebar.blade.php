<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon" >
                    <img src="{{asset('assets/logo polije.png')}}" alt="" style="width: 50px; height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">Toko Obat</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('data_obat.index')}}">
                    <i class="fas fa-fw fa-pills"></i>
                    <span>Data Obat</span></a>
            </li>

            <!-- Nav Item - Charts -->
            

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('obat_keluar.index')}}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Obat Keluar</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="laporan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>