<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="{{ asset('img/kingleagueone_icon_white_notext.png') }}" width="25">
    </div>
    <div class="sidebar-brand-text mx-3">Kingleagueone</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ request()->routeIs('index*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Data Peserta
  </div>

  <!-- Nav Item - Charts -->
  <li class="nav-item {{ request()->routeIs('registrasiPeserta*') ? 'active' : '' }}">
    <a class="nav-link" href="/registrasi-peserta">
    <i class="fas fa-fw fa-plus"></i>
    <span>Registrasi Peserta</span></a>
  </li>
  <li class="nav-item {{ request()->routeIs('listPeserta*') ? 'active' : '' }}">
    <a class="nav-link" href="/list-peserta">
    <i class="fas fa-fw fa-users"></i>
    <span>List Peserta</span></a>
  </li>
  {{-- <li class="nav-item {{ request()->routeIs('registrasiTim*') ? 'active' : '' }}">
    <a class="nav-link" href="/registrasi-tim">
    <i class="fa-solid fa-people-group"></i>
    <span>Registrasi Tim</span></a>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->