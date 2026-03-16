<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Edit Kategori Barang</title>

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboards'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">Barang</div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('goods/list'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Daftar Barang</span>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('goods/category'); ?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Kategori Barang</span>
        </a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                <img class="img-profile rounded-circle"
                  src="<?= base_url('assets/'); ?>img/undraw_profile.svg">
              </a>
            </li>
          </ul>

        </nav>

        <div class="container-fluid">

          <h1 class="h3 mb-2 text-gray-800">Edit Kategori Barang</h1>
          <p class="mb-4">Ubah kategori barang</p>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Edit Kategori</h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message') ?>

              <form method="post" action="<?= base_url('goods/category_update/' . $category['id']); ?>">
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Masukan nama kategori"
                    name="name"
                    value="<?= set_value('name', $category['name']); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">','</small>') ?>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('goods/category'); ?>" class="btn btn-secondary">Kembali</a>
              </form>
            </div>
          </div>

        </div>

      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>

    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

</body>
</html>
