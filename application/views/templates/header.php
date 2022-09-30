<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIBOS</title>
  <link rel="stylesheet" href="<?=base_url('theme');?>/docs/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/summernote/summernote-bs4.min.css">
  
  <link rel="icon" href="<?=base_url('assets/img/logo.png');?>" type="image/ico">
  <style type="text/css">
  	body{
			background: url(<?=base_url('assets/img/silver.jpg');?>);
			background-repeat: no-repeat;
			background-size: cover;
  	}
    .primer
    {
      background-color:#1E6F5C;
    }
    .alert{
      right:4px;
      top:4px;
      width: 400px;
      position: absolute;
    }

    .dropdown-submenu {
        position: relative;
    }

  .dropdown-submenu>.dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -6px;
      margin-left: -1px;
      -webkit-border-radius: 0 6px 6px 6px;
      -moz-border-radius: 0 6px 6px;
      border-radius: 0 6px 6px 6px;
  }

  .dropdown-submenu:hover>.dropdown-menu {
      display: block;
  }

  </style>
</head>
<body class="text-sm hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed">
<!-- <body class="hold-transition sidebar-collapse sidebar-mini"> -->
<div class="wrapper">
  <!-- Navbar -->
  <nav style="background-color:#B22222;" class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <?php
          if($this->session->flashdata('notifikasi')){
            echo $this->session->flashdata('notifikasi');
          }
        ?>
      </li>
<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url();?>" class="nav-link text-light"><?=$tools['title'];?></a>
      </li> -->
<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
