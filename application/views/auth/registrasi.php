<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIBOS</title>
  <link rel="stylesheet" href="<?=base_url('theme');?>/docs/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/dist/css/adminlte.min.css">
  <link rel="icon" href="<?=base_url('assets/img/logo-dishub.png');?>" type="image/ico">
  <style type="text/css">
		body
		{
		  background-image: url('<?=base_url('assets/img/bengkel2.webp');?>');
		  background-repeat: no-repeat;
		  background-size: cover;
		}
		
		.transparent{
			background:rgba(0, 0, 0, 0.5);
			color:#fff;
			text-align:center;
		}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  	<img width="96px" src="<?=base_url('assets/img/logo-dishub.png');?>">
<!--     <a href="<?=base_url('dashboard');?>">
    	<b class="text-light">S  I  B  O  S</b><br>
    	<b class="text-light text-md">Sistem Informasi Bengkel Online & Sparepart</b>
    </a> -->
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-lg">
      	REGISTRASI <br>
      	S I B O S <br>
      	<c class="text-sm">Sistem Informasi Bengkel Online & Sparepart</c>
      </p>
      <form action="<?=base_url('auth/registrasi');?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-sm rounded-0" name="nama" placeholder="Nama Lengkap" value="<?=set_value('username');?>">
          <div class="input-group-append">
            <div class="input-group-text rounded-0">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-sm rounded-0" name="username" placeholder="Username" value="<?=set_value('username');?>">
          <div class="input-group-append">
            <div class="input-group-text rounded-0">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
		<div class="input-group mb-3">
			<input type="password" class="form-control form-control-sm rounded-0" name="password" placeholder="Password">
			<div class="input-group-append">
				<div class="input-group-text rounded-0">
					<span class="fas fa-lock"></span>
				</div>
			</div>
		</div>
        <div class="row mb-3">
          <div class="col-sm">
            <button type="submit" class="btn btn-sm btn-danger btn-block rounded-0"><i class="fas fa-fw fa-file-signature text-white-50"></i> Daftar</button>
          </div>
          <div class="col-sm">
            <a href="<?=base_url('auth');?>" class="btn btn-sm btn-primary btn-block rounded-0"><i class="fas fa-fw fa-sign-in-alt text-white-50"></i> Login</a>
          </div>
        </div>
      </form>
			<div class="row mb-3">
			  <div class="col-sm">
			    <a href="<?=base_url('dashboard');?>" class="btn btn-sm btn-secondary btn-block rounded-0"><i class="fas fa-fw fa-home text-white-50"></i> Beranda</a>
			  </div>
			</div>
			<div class="row">
				<div class="col-sm">
					<?php
						if($this->session->flashdata('notifikasi')){
						echo $this->session->flashdata('notifikasi');
						}
					?>
				</div>
			</div>
    </div>
  </div>
</div>
</body>
<script src="<?=base_url('theme');?>/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('theme');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('theme');?>/dist/js/adminlte.js"></script>
</body>
</html>

