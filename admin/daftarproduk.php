<?php 
session_start();

if( !isset($_SESSION["masuk"]) ) {
    header("Location: login.php");
    exit;
}

require '../functions.php';
require 'tampilusers.php';
$daftar_produk = query("SELECT * FROM produk");
notif();



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Produk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
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
        <a href="logout.php" class="btn btn-danger">Logout
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-red elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link navbar-red">
      <img src="dist/img/AdminLTELogo.png"  class="brand-image " >
      <span class="brand-text font-weight-bold">ADMIN DIMASTECH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $admin;  ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Produk
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="daftarbuku.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="transaksi.php" class="nav-link">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Data Transaksi
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="manageuser.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Management User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="aboutapp.php" class="nav-link">
              <i class="nav-icon fas fa-code"></i>
              <p>
                About App
              </p>
            </a>
          </li>
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
            <h1>Daftar Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Daftar Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon ion ion-bag"></i>
                Daftar Produk</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <!-- Tambah data mahasiswa -->
              <button type="submit" name="tambah" class="btn btn-primary" data-toggle="modal" data-target="#tambah-produk"><i class="nav-icon fas fa-plus"></i> Tambah Produk</button>
              <br><br>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Foto</th>
                    <th>Produk</th>
                    <th>Harga</th>                    
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; ?>
                  <?php foreach( $daftar_produk as $produk ) : ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><img width="75px" src="../images/produk/<?= $produk["gambar"]; ?>"></td>
                    <td><?= $produk["nama"]; ?></td>
                    <td>Rp. <?= rupiah($produk["harga"]); ?>,-</td>                    
                    <td>
                      <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#detail-<?= $produk["id"]; ?>">
                      <i class="nav-icon fas fa-search"></i> Detail</button>
                      <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#ubah-<?= $produk["id"]; ?>">
                      <i class="nav-icon fas fa-pen"></i> Ubah</button>
                      <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus-<?= $produk["id"]; ?>">
                      <i class="nav-icon fas fa-trash"></i> Hapus</button>
                    </td>
                  </tr>
                  <?php $i++; ?>

                  <!-- modal hapus -->
                  <div class="modal fade" id="hapus-<?= $produk["id"]; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title"><i class="icon fas fa-exclamation-triangle"></i> Hapus Produk !!</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <label>Apakah anda yakin ingin menghapus produk :</label>
                          <p><?= $produk["nama"]; ?></p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                          <a href="hapusproduk.php?id=<?= $produk["id"]; ?>" class="btn btn-default">Hapus</a>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>

                  <!-- modal tambah produk -->
                  <div class="modal fade" id="tambah-produk">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title"><i class="nav-icon ion ion-bag"></i> Tambah Produk</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>                        

                          <form action="tambahproduk.php" method="post" enctype="multipart/form-data">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="nama">Nama Produk</label>
                              <input type="text" class="form-control" name="nama" id="nama" required placeholder="Nama Produk">
                            </div>
                            <div class="form-group">
                              <label for="harga">Harga Produk</label>
                              <input type="text" class="form-control" name="harga" id="harga" required placeholder="Harga Produk">
                            </div>
                            <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                            </div>       
                            <div class="form-group">
                              <label for="kategori">Kategori</label>
                              <select class="form-control" name="kategori" id="kategori">
                                    <option>-- Kategori --</option>
                                    <option>SSD</option>
                                    <option>HDD</option>
                                    <option>Prosessor</option>
                                    <option>Motherboard</option>
                                    <option>RAM</option>
                                  </select>
                            </div>   

                            <div class="form-group">
                              <label for="gambar">Foto Produk</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                  <label class="custom-file-label" for="gambar">Pilih file</label>
                                </div>
                              </div>
                            </div><br>
                            
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-danger">Tambah Produk</button>
                            
                          </div>
                          <!-- /.card-body -->
                        </form>                        
                        
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- modal detail produk -->
                  <div class="modal fade" id="detail-<?= $produk["id"]; ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Detail Produk</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                          <p align="center"><img width="175px" src="../images/produk/<?= $produk["gambar"]; ?>"></p>
                          
                          <label>Nama Produk : </label>
                          <p><?= $produk["nama"]; ?></p>
                          
                          
                          <label>Harga Produk : </label>
                          <p>Rp. <?= rupiah($produk["harga"]); ?>,-</p>
                          

                          <label>Keterangan : </label>
                          <p><?= $produk["keterangan"]; ?></p>
                          
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal detail -->

                  <!-- modal ubdah produk -->
                  <div class="modal fade" id="ubah-<?= $produk["id"]; ?>">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Ubah Produk</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        <form action="ubahproduk.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $produk["id"]; ?>">
                                <input type="hidden" name="gambarLama" value="<?= $produk["gambar"]; ?>">

                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input type="text" class="form-control" name="nama" id="nama" required value="<?= $produk["nama"]; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="harga">Harga Produk</label>
                                    <input type="text" class="form-control" name="harga" id="harga" required value="<?= $produk["harga"]; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="3" name="keterangan" id="keterangan"><?= $produk["keterangan"]; ?></textarea>
                                  </div>       
                                  <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">                          
                                          <option>-- Pilih --</option>
                                          <option>SSD</option>
                                          <option>HDD</option>
                                          <option>Prosessor</option>
                                          <option>Motherboard</option>
                                          <option>RAM</option>
                                        </select>
                                  </div>   

                                  <div class="form-group">
                                    <label for="gambar">Foto Produk</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                        <label class="custom-file-label" for="gambar">Pilih file</label>
                                      </div>
                                    </div><br>
                                    
                                    <img src="../images/produk/<?= $produk["gambar"];  ?>" width="85">
                                    
                                  </div>

                                  <div class="justify-content-between">
                                  <button type="submit" name="submit" class="btn btn-danger">Ubah Produk</button>
                                  </div>
                                </div>
                                <!-- /.card-body -->
                              </form>                         
                                                
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal detail -->
                  <?php endforeach; ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
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
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Notif dari Toastr -->
<script src="dist/js/notif.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


</body>
</html>
