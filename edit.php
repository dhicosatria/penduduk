<?php
require ("config.php");

if( !isset($_REQUEST['id_edit']) ){
    header('Location: data_penduduk.php');
}

// buat query untuk ambil data dari database
$id_edit = $_REQUEST['id_edit'];
$sql = "SELECT * FROM tbl_penduduk WHERE id = $id_edit";
$query = mysqli_query($koneksi, $sql);
$edit_ambil_data = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Edit Data Penduduk | AdminLTE 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="img/AdminLTELogo.png" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Dean Pendo
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Jam Yang Lalu</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  dewaahm
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 1 jam yang lalu</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 12 Jam yang lalu</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/Photo.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dhico satria</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Form Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-closed">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tabel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data_penduduk.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel Penduduk</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Penduduk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Penduduk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col mr-5 ml-5 pr-5 pl-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isi Form Di Bawah Ini</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form  action="proses_edit.php" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $edit_ambil_data['id'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Anda" value="<?php echo $edit_ambil_data['nik'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?php echo $edit_ambil_data['nama_lengkap'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki" <?php if ($edit_ambil_data['jenis_kelamin'] == 'Laki-Laki') echo 'checked="checked"'; ?> >
                                <label class="form-check-label">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?php if ($edit_ambil_data['jenis_kelamin'] == 'Perempuan') echo 'checked="checked"'; ?> >
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2" placeholder="Masukkan Alamat"><?php echo $edit_ambil_data['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_kawin">Status Pernikahan</label>
                            <select class="form-control" name="status_kawin" id="status_kawin" value="<?php echo $edit_ambil_data['status_perkawinan'] ?>">
                                <option value="Belum Kawin" <?php if ($edit_ambil_data['status_perkawinan'] == 'Belum Kawin') echo 'selected'; ?> >Belum Kawin</option>
                                <option value="Kawin"  <?php if ($edit_ambil_data['status_perkawinan'] == 'Kawin') echo 'selected'; ?>>Kawin</option>
                                <option value="Cerai Hidup" <?php if ($edit_ambil_data['status_perkawinan'] == 'Cerai Hidup') echo 'selected'; ?> >Cerai Hidup</option>
                                <option value="Cerai Mati" <?php if ($edit_ambil_data['status_perkawinan'] == 'Cerai Mati') echo 'selected'; ?> >Cerai Mati</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input class="form-control" type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan Anda" value="<?php echo $edit_ambil_data['pekerjaan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan" value="WNI" <?php if ($edit_ambil_data['kewarganegaraan'] == 'WNI') echo 'checked="checked"'; ?>>
                                <label class="form-check-label">WNI</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kewarganegaraan" id="kewarganegaraan" value="WNA" <?php if ($edit_ambil_data['kewarganegaraan'] == 'WNA') echo 'checked="checked"'; ?>>
                                <label class="form-check-label">WNA</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir Anda" value="<?php echo $edit_ambil_data['tempat_lahir'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $edit_ambil_data['tanggal_lahir'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="golongan_darah">Golongan Darah</label>
                            <select class="form-control" name="goldar" id="goldar" value="<?php echo $edit_ambil_data['goldar'] ?>">
                                <option value="A" <?php if ($edit_ambil_data['goldar'] == 'A') echo 'selected'; ?> >A</option>
                                <option value="B" <?php if ($edit_ambil_data['goldar'] == 'B') echo 'selected'; ?> >B</option>
                                <option value="AB" <?php if ($edit_ambil_data['goldar'] == 'AB') echo 'selected'; ?>>AB</option>
                                <option value="O" <?php if ($edit_ambil_data['goldar'] == 'O') echo 'selected'; ?>>O</option>
                                <option value="Belum Diketahui" <?php if ($edit_ambil_data['goldar'] == 'Belum Diketahui') echo 'selected'; ?> >Belum Tahu</option>
                            </select>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="simpan" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
