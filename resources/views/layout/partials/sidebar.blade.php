<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="{{ asset('img/kingleagueone_icon_white_notext.png') }}" width="25">
    </div>
    <div class="sidebar-brand-text mx-3">PSSI League One</div>
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
  </li>
  <li class="nav-item">
    <button type="button" class="nav-link bg-transparent border-0" data-bs-toggle="modal" data-bs-target="#scanQRModal">
      <i class="fa-solid fa-fw fa-qrcode"></i>
    <span>Scan QR Code</span></button>
    <!-- Modal -->
    <div class="modal fade" id="scanQRModal" tabindex="-1" aria-labelledby="scanQRModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="scanQRModalLabel">Scan QR Code</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center justify-content-center">
              <div class="w-100" id="reader"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
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