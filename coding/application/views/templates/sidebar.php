<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('administrator/dashboard'); ?>">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('assets/'); ?>img/logo/logo-rental.jpeg" width="150">
    </div>
    <div class="sidebar-brand-text mx-3"></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/dashboard') ; ?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/admin'); ?>">
        <i class="fas fa-fw fa-user-cog"></i>
        <span>Admin</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/banner'); ?>">
        <i class="fas fa-fw fa-clone"></i>
        <span>Banner</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/mobil'); ?>">
        <i class="fas fa-fw fa-car"></i>
        <span>Mobil</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/supir'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Supir</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/customer'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Customer</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/pesanan'); ?>">
        <i class="fas fa-fw fa-file-invoice-dollar"></i>
        <span>Pesanan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/pemasukan'); ?>">
        <i class="fas fa-fw fa-money-bill-alt"></i>
        <span>Pemasukan</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/pengeluaran'); ?>">
        <i class="fas fa-fw fa-money-bill"></i>
        <span>Pengeluaran</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('administrator/grafik'); ?>">
        <i class="fas fa-fw fa-chart-bar"></i>
        <span>Grafik Laba</span>
      </a>
    </li>

  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('administrator/testimoni'); ?>">
      <i class="fas fa-fw fa-comments"></i>
      <span>Testimoni</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('administrator/setting'); ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Setting</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar