<?php
      require("config.php");

      $data_penduduk = "SELECT * FROM `tbl_penduduk` ORDER BY id DESC";
      $proses_ambil = $koneksi->query($data_penduduk);

      function ambildata_penduduk ($koneksi){
        return  $proses_ambil;
    }

    function hapus_data ($koneksi, $id){
        $hapus = "DELETE FROM tbl_penduduk WHERE id = '$id'";
        $proses_hapus = mysqli_query($koneksi,$hapus);
        return "Berhasil";
    }
    class Penduduk {

        /* nik, nama_lengkap, jenis_kelamin, alamat, status_perkawinan, pekerjaan,
         kewarganegaraan, tempat_lahir, tanggal_lahir,goldar*/
        public $nik;
        public $nama_lengkap;
        public $jenis_kelamin;
        public $alamat;
        public $status_perkawinan;
        public $pekerjaan;
        public $kewarganegaraan;
        public $tempat_lahir;
        public $tanggal_lahir;
        public $goldar;

        function set_data_all($nik ,$nama_lengkap, $jenis_kelamin,$alamat, $status_perkawinan,$pekerjaan,$kewarganegaraan, $tempat_lahir, $tanggal_lahir,  $goldar) {
            $this->nik = $nik;
            $this->nama_lengkap = $nama_lengkap;
            $this->jenis_kelamin = $jenis_kelamin;
            $this->alamat = $alamat;
            $this->status_perkawinan = $status_perkawinan;
            $this->pekerjaan = $pekerjaan;
            $this->kewarganegaraan = $kewarganegaraan;
            $this->tempat_lahir = $tempat_lahir;
            $this->tanggal_lahir = $tanggal_lahir;
            $this->goldar = $goldar;
        }

        function get_nik() {
          return $this->nik;
        }
        function get_nama_lengkap() {
            return $this->nama_lengkap;
        }
        function get_kewarganegaraan() {
          return $this->kewarganegaraan;
        }
        function get_alamat() {
          return $this->alamat;
        }
        function get_status_perkawinan() {
          return $this->status_perkawinan;
        }
        function get_pekerjaan() {
          return $this->pekerjaan;
        }
        function get_tanggal_lahir() {
            $formatTanggalLama = $this->tanggal_lahir;
            $formatTanggalBaru = date("d-m-Y", strtotime($formatTanggalLama));
            return $formatTanggalBaru;
        }
        function get_jenis_kelamin() {
            $formatJenisKelamin = ucfirst($this->jenis_kelamin);
            return $formatJenisKelamin;
        }
        function get_tempat_lahir() {
            $formatTempatLahir = ucfirst($this->tempat_lahir);
            return $formatTempatLahir;
        }
        function get_goldar() {
            $get_goldar = ucfirst($this->goldar);
            return $get_goldar;
        }

        function hitung_umur()
        {
            $tgl_lhr = new DateTime($this->tanggal_lahir);
            $tgl_skrg = new DateTime();
            $interval = $tgl_skrg->diff($tgl_lhr);
            return $interval->y;
        }
        

        // Tambah Penduduk
        function tambahpenduduk ($koneksi,$nik ,$nama_lengkap, $jenis_kelamin,$alamat, $status_perkawinan,$pekerjaan,$kewarganegaraan, $tempat_lahir, $tanggal_lahir,  $goldar){

          $tambahdata = "INSERT INTO tbl_penduduk (nik ,nama_lengkap,jenis_kelamin,alamat,status_perkawinan,pekerjaan,kewarganegaraan,tempat_lahir,tanggal_lahir, goldar) VALUES ('$nik' ,'$nama_lengkap', '$jenis_kelamin','$alamat', '$status_perkawinan','$pekerjaan','$kewarganegaraan',' $tempat_lahir', '$tanggal_lahir',  '$goldar')";
          $proses_tambah =mysqli_query($koneksi, $tambahdata);
          if ($proses_tambah) echo "Data Berhasil Ditambah";
		      else echo "Data Gagal Ditambah";
        }

        // function ambildata_penduduk ($koneksi){
        //   $data_penduduk = "select * from tbl_penduduk";
        //   $proses_ambil =mysqli_query($koneksi, $data_penduduk);
        //   return  $proses_ambil;
        // }

        // function hapus_data ($koneksi, $id){
        // $hapus = "DELETE FROM tbl_penduduk WHERE id = '$id'";
        // $proses_hapus = mysqli_query($koneksi,$hapus);
        // return "Berhasil";
        //}
        
    }

     //post data
     if(isset($_POST['submit'])){
        if ( $_POST['nik'] != ''
        and $_POST['nama_lengkap'] != '' 
        and $_POST['jenis_kelamin'] != '' 
        and $_POST['status_perkawinan'] != '' 
        and $_POST['pekerjaan'] != '' 
        and $_POST['kewarganegaraan'] != ''  
        and $_POST['alamat']!= '' 
        and $_POST['tempat_lahir']!= '' 
        and $_POST['tanggal_lahir'] != ''  
        and $_POST['goldar'])
        {
        $nik = $_POST['nik'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $status_perkawinan = $_POST['status_perkawinan'];
        $pekerjaan = $_POST['pekerjaan'];
        $kewarganegaraan = $_POST['kewarganegaraan'];
        $alamat = $_POST['alamat'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $goldar = $_POST['goldar'];
    
        $penduduk_post = new penduduk();
        // $penduduk_post->set_data_all($nik,$nama_lengkap,$jenis_kelamin,$status_perkawinan,$pekerjaan,$kewarganegaraan,$alamat,$tempat_lahir,$tanggal_lahir,$goldar);
        // $klasifikasi=$penduduk->klasifikasi();

        $penduduk_post->tambahpenduduk($koneksi,$nik,$nama_lengkap,$jenis_kelamin,$status_perkawinan,$pekerjaan,$kewarganegaraan,$alamat,$tempat_lahir,$tanggal_lahir,$goldar);
            }
        }
         

 
    if (isset($_POST['Hapus'])){
      if ($_POST['nik'] != ''){
          $penduduk_hapus = new penduduk();
          $hapus_data = $penduduk_hapus->hapus_data($koneksi,$_POST['nik']);
      
          $data_penduduk_db = $penduduk_hapus->ambildata_penduduk($koneksi);
  
      }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

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
        <a href="index.php" class="nav-link">Home</a>
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
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
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
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
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
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
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
          <img src="img/photo.jpg" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-item menu-open">
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
            <h1>Tabel Hasil Form Penduduk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Tabel Penduduk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hasil Pengisian Form</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Staus Perkawinan</th>
                      <th>pekerjaan</th>
                      <th>kewarganegaraan</th>
                      <th>tempatLahir</th>
                      <th>Tanggal lahir</th>
                      <th>Golongan darah</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                            // FETCHING DATA FROM DATABASE
                            if ($proses_ambil->num_rows > 0) 
                            {
                                // OUTPUT DATA OF EACH ROW
                                while($data_tabel_penduduk = $proses_ambil->fetch_assoc())
                                { ?>
                                    <tr>
                                        <td><?php echo $data_tabel_penduduk["nik"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["nama_lengkap"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["jenis_kelamin"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["alamat"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["status_perkawinan"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["pekerjaan"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["kewarganegaraan"]; ?></td>
                                        <td><?php echo $data_tabel_penduduk["tempat_lahir"]; ?></td>
                                        <td>
                                            <?php 
                                                $formatTanggalLama = DateTime::createFromFormat('Y-m-d', $data_tabel_penduduk["tanggal_lahir"]);
                                                $formatTanggalBaru = $formatTanggalLama->format('d-m-Y');
                                                echo $formatTanggalBaru;
                                            ?>
                                        </td>
                                        <td><?php echo $data_tabel_penduduk["goldar"]; ?></td>
                                        <td>
                                            <form class="mb-3" action="edit.php" method="post">
                                                <input type="text" name="id_edit" value="<?=$data_tabel_penduduk["id"]; ?>" hidden>
                                                <button class="btn btn-primary" type="submit"><i class="fas fa-pen"></i></button>
                                            </form>
                                            <form action="delete.php" method="post">
                                                <input type="text" name="id_delete" value="<?=$data_tabel_penduduk["id"]; ?>" hidden>
                                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                              }
                              ?>
                              <tr>
                            <td colspan="11">
                                <a href="index.php">
                                    <button class="btn btn-primary btn-block" type="submit">Tambah Data</button>
                                </a>
                            </td>
                        </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
