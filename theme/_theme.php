<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title;?></title>

    <link rel="stylesheet" href=<?=asset("plugins/fontawesome-free/css/all.min.css");?>>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=<?=asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css");?>>
    <link rel="stylesheet" href=<?=asset("dist/css/adminlte.min.css");?>>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href=<?= url();?> class="nav-link">Home</a>
      </li>
      
    </ul>
      
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=<?= url();?> class="brand-link">
      <img src=<?= asset("/dist/img/AdminLTELogo.png");?>
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Comdata</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-upload"></i>
              <p>
                Importar arquivos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href=<?= url("jar");?> class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>JAR</p>
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
            <h1><?= $titulo;?></h1>
          </div>
          <div class="col-sm-6">
          
            <?= $v->section('breadcrumb');?>

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <?= $v->section("content");?>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Comdata group.</strong>
    Equipe de desenvolvimento.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->
    
<!-- jQuery -->
<script src= <?=asset("plugins/jquery/jquery.min.js");?>></script>
<!-- Bootstrap 4 -->
<script src=<?=asset("plugins/bootstrap/js/bootstrap.bundle.min.js");?>></script>
<!-- overlayScrollbars -->
<script src=<?=asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js");?>></script>
<!-- AdminLTE App -->
<script src=<?=asset("dist/js/adminlte.min.js");?>></script>

<?= $v->section('script');?>

</body>

</html>