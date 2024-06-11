<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/logo.png') }}" alt="" style="width: 45px; height: 45px;">
        </div>
        <div class="sidebar-brand-text mx-2 mt-3">
            <h3 class="fw-bold font-weight-bold">{{ env('APP_NAME')}}</h3>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @if (Auth::user()->role == 'apoteker')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('obat.index') }}">
            <i class="fas fa-fw fa-pills"></i>
            <span>Data Obat</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('obat.masuk.index') }}">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Obat Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('obat.keluar.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Obat Keluar</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('kategori.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Data Kategori</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('satuan.index') }}">
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Data Satuan</span>
        </a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-user-alt"></i>
            <span>Data User</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporan.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan</span></a>
    </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
