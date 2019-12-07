<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
    <?php if (isset($this->session->status)){ ?>
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">PT.ADINATA</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
      <a class="nav-link" href="<?= base_url() ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      <font size="3">Menu</font>
    </div>

    <?php  if ($this->session->uid == "1") {?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url().'daftar' ?>">
            <span><font size="3">Register</font></span>
          </a>
        </li>
      <?php } ?>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url().'view_barang' ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span><font size="3">Stok Barang</font></span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url().'view_bahan' ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><font size="3">Stok Bahan</font></span></a>
          </li>
          <hr class="sidebar-divider">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url().'Logout' ?>">
              <span><i class="icofont-logout icofont-2x"></i><font size="3">Logout</font></span>
            </a>
          </li>
        <?php } ?>
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          <?php if (isset($this->session->status)){ ?>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icofont-ui-user icofont-2x text-gray-600 mr-3"></i><span class="mr-2 d-none d-lg-inline text-gray-600 small"><font size="3"><?= $this->session->nama; ?></font></span>
              </a>
            </li>
          <?php } ?>
          </ul>
        </nav>
        <!-- End of Topbar -->
