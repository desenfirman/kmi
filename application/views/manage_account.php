<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT. KMI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- datatables -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/bower_components')?>/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/dist')?>/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url ('assets/template/dist')?>/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kawasaki</b>RFS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="<?php echo base_url().'web/notif' ?>" >
              <i class="fa fa-bell-o"></i>
              <?php 
              $userdata = $this->session->userdata('email');
              $koneksi = mysqli_connect("localhost","root","","newkmi");
              $countnotif = mysqli_query($koneksi,"SELECT COUNT(email_track_2) AS 'nreq' FROM notifikasi WHERE status='unread' AND email_track_2 LIKE \"%$userdata%\"");
              $countnotifvalue = mysqli_fetch_assoc($countnotif);
              ?>

              <?php if($countnotifvalue == 0) {?>
                <span class="label label-warning"></span>
              <?php } else {?>
                <span class="label label-warning"><?php echo $printop = $countnotifvalue['nreq'] ?></span>
              <?php } ?>
              
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url().'web/profile' ?>">
              <span class="hidden-xs"><?php echo $this->session->userdata('email') ?></span>
            </a>
          </li>
          <!-- Log Out Button -->
          <li>
            <a href="<?php echo base_url().'web/logout' ?>" class="btn">Log out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REQUISITION FORM SYSTEM</li>
        <li><a href="<?php echo base_url().'web/home' ?>"><i class="fa fa-table"></i> <span>Home</span></a></li>
        <li><a href="<?php echo base_url().'web/form' ?>"><i class="fa fa-files-o"></i> <span>Create New Form</span></a></li>
        <li><a href="<?php echo base_url().'web/change_status' ?>"><i class="fa fa-edit"></i> <span>Status Change</span></a></li>
        <li><a href="<?php echo base_url().'web/inventory' ?>"><i class="fa fa-folder"></i> <span>Inventory</span></a></li> 
        <li><a href="<?php echo base_url().'web/statistics' ?>"><i class="ion ion-stats-bars"></i> <span>Statistics</span></a></li>
        <li><a href="<?php echo base_url().'web/history' ?>"><i class="fa fa-book"></i> <span>History</span></a></li>
        <li><a href="<?php echo base_url().'web/manage_account' ?>"><i class="fa fa-wrench"></i> <span>Manage Account</span></a></li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Account
        <small>Manage Account Menu</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>Create New Account</h4>
            </div>
            <a href="<?php echo base_url().'web/create_new_account' ?>" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>Delete Account</h4>
            </div>
            <a href="<?php echo base_url().'web/delete_account' ?>" class="small-box-footer">Klik Disini <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account List</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="tableakun">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>E-mail</th>
                  <th>Password</th>
                  <th>Jabatan</th>
                  <th>Departemen</th>
                  <th>Telepon</th>
                  <th>Action</th>
                </tr>
                <thead>
                <tbody>
                <?php foreach ($akun as $a) { ?>
                <tr>
                  <td><?php echo $a->nama ?></td>
                  <td><?php echo $a->email ?></td>
                  <td><?php echo $a->password ?></td>
                  <td><?php echo $a->Jabatan ?></td>
                  <td><?php echo $a->Departemen ?></td>
                  <td><?php echo $a->telepon ?></td>
                  <td><a class="btn btn-block btn-xs" href="<?php echo base_url()?>web/see_details_account?id_account=<?php echo $a->id_account ?>"> SEE DETAILS </a></td>
                </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="https://kawasaki-motor.co.id">Kawasaki Motor</a>.</strong> All rights
    reserved.
  </footer>

  <script src="<?php echo base_url ('assets/template/bower_components/jquery')?>/dist/jquery.min.js"></script>
  <script src="<?php echo base_url ('assets/template/bower_components/bootstrap')?>/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url ('assets/template/bower_components/jquery-slimscroll')?>/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url ('assets/template/dist')?>/js/adminlte.min.js"></script>

  <script src="<?php echo base_url ('assets/template/bower_components/datatables.net')?>/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url ('assets/template/bower_components/datatables.net-bs')?>/js/dataTables.bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#tableakun').DataTable()
    })
  </script>

</body>
</html>