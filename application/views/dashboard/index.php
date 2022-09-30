<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>S I B O S</title>
  <link rel="stylesheet" href="<?=base_url('theme');?>/docs/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/dist/css/adminlte.min.css">
  <link rel="icon" href="<?=base_url('assets/img/logo.png');?>" type="image/ico">
	<style>
		body {
			background: url('<?=base_url('assets/img/bengkel2.webp');?>') repeat;
			/*background: url('<?=base_url('assets/img/bengkel2.webp');?>') repeat;*/
			background-repeat: no-repeat;
			background-size: cover;
/*			width: 100%;
			height: 100vh;*/
		}
	</style>
</head>
<body class="hold-transition layout-footer-fixed layout-top-nav">
<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-sm">
			<div style="background-color:#B22222;" class="card rounded-0 border border-warning">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-1 d-flex justify-content-center">
							<img width="54px" src="<?=base_url('assets/img/logo-dishub.png');?>">
						</div>
						<div class="col-sm-4 text-light">
							<div class="row">
								<div class="col">
									<b>S I B O S</b>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<p>Sistem Informasi Bengkel Online & Sparepart</p>
								</div>
							</div>
						</div>
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
	</div>
	<div class="row">
		<div class="col-sm-3">
			<div style="background-color:#B22222;" class="card rounded-0 border border-warning">
				<div class="card-header text-light">
					<i class="fas fa-fw fa-info-circle mr-1"></i> Pencarian
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm">
							<form action="" method="post">
								<div class="form-group">
									<input type="text" name="cari_s" value="<?=$cari_s;?>" class="form-control form-control-sm" placeholder="Cari....">
								</div>
								<div class="form-group">
									<select name="kategori_s" class="form-control form-control-sm">
										<option value="">Semua Kategori</option>
										<?php foreach ($kategori as $row): ?>
										<option <?php if($kategori_s==$row['kode_kategori']){echo 'selected';} ?> value="<?=$row['kode_kategori'];?>"><?=$row['nama_kategori'];?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="form-group">
									<select id="kecamatan" name="kecamatan_s" class="form-control form-control-sm select2">
									  <?php 
									    if (!empty($this->session->userdata('sess_kecamatan'))) {
									      $kec=$this->daerah->getKecById($this->session->userdata('sess_kecamatan'));
									      ?>
									      <option value="<?=$kecamatan_s;?>"><?=$kec['nama_kec'];?></option>
									      <?php
									    }else{
									      ?>
									      <option value="" selected>Semua Kecamatan</option>
									      <?php
									    }
									  ?>
									</select>
								</div>
								<div class="form-group">
									<select id="kelurahan" name="kelurahan_s" class="form-control form-control-sm select2">
									  <?php 
									    if (!empty($this->session->userdata('sess_kelurahan'))) {
									      $kec=$this->daerah->getKelById($this->session->userdata('sess_kelurahan'));
									      ?>
									      <option value="<?=$kelurahan_s;?>"><?=$kec['nama_kel'];?></option>
									      <?php
									    }else{
									      ?>
									      <option value="" selected>Semua Kelurahan</option>
									      <?php
									    }
									  ?>
									</select>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6 col-md-6 mb-3">
										<button type="submit" class="btn btn-sm btn-block btn-primary"><i class="fas fa-fw fa-check text-white-50"></i> Terapkan</button>
									</div>
									<div class="col-12 col-sm-6 col-md-6">
										<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('dashboard/reset/dashboard/index');?>"><i class="fas fa-fw fa-sync text-white-50"></i> Reset</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<hr class="border border-light">
					<?php if (!empty($this->session->userdata('default_page'))): ?>
						<div class="row">
							<div class="col-12 col-sm-6 col-md-6 mb-3">
								<a class="btn btn-block btn-sm btn-outline-light" href="<?=base_url($this->session->userdata('default_page'));?>"><i class="fas fa-fw fa-bars"></i> Menu</a>
							</div>
							<div class="col-12 col-sm-6 col-md-6">
								<a onclick="return confirm('Anda yakin ingin mengakhiri sesi?')" class="btn btn-block btn-sm btn-outline-light" href="<?=base_url('auth/logout');?>"><i class="fas fa-fw fa-sign-in-alt"></i> Logout</a>
							</div>
						</div>	
					<?php else: ?>					
						<div class="row">
<!-- 							<div class="col-12 col-sm-6 col-md-6 mb-3">
								<a href="<?=base_url('auth/register');?>" type="submit" class="btn btn-sm btn-block btn-outline-light"><i class="fas fa-fw fa-file-signature"></i> Daftar</a>
							</div> -->
							<div class="col-12 col-sm-6 col-md-12">
								<a class="btn btn-block btn-sm btn-outline-light" href="<?=base_url('auth');?>"><i class="fas fa-fw fa-sign-in-alt"></i> Login/Daftar</a>
							</div>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="col-sm">
		<?php if (!empty($bengkel)): ?>
		<div class="row">
		  <?php foreach ($bengkel as $row): ?>
		    <div class="col-sm-4">
		    <!-- <div class="col-12 col-sm-6 col-md-3"> -->
		      <div style="background-color:#FFF8CD;" style="cursor:pointer;" class="info-box rounded-0 border border-warning" data-toggle="modal" data-target="<?='#bengkel'.$row['id_bengkel'];?>">
		        <?php if ($row['kode_kategori']=='R2'): ?>
		          <span class="info-box-icon bg-info elevation-1 rounded-0"><i class="fas fa-motorcycle"></i></span>
		        <?php else: ?>
		          <span class="info-box-icon bg-danger elevation-1 rounded-0"><i class="fas fa-car"></i></span>
		        <?php endif ?>
		        <div class="info-box-content">
		          <span class="info-box-text"><?=$row['nama_bengkel'];?> <?=' ('.$row['no_telp'].')';?></span>
		          <span class="info-box-text"><a target="_blank" href="<?=$row['peta'];?>"><i class="fas fa-fw fa-map-marker-alt"></i> <?=$row['alamat_bengkel'];?></a></span>
		              <!-- $layanan=$this->layanan->getLayananByNoreg($row['noreg']); -->
		        </div>
		      </div>
		    </div>
		  <?php endforeach ?>
		</div>
		<?php else: ?>
		  <?='Data Tidak Ditemukan';?>
		<?php endif ?>
		</div>
	</div>
</div>
  <footer style="background-color:#7C0A02;" class="main-footer text-light">
  	Dinas Perhubungan Pemerintah Kabupaten Boyolali | Website : <a class="text-light" target="_blank" href="<?='http://dishub.boyolali.go.id/';?>">http://dishub.boyolali.go.id/</a> | Email :  dishub@boyolali.go.id | Admin : 0812 3456 7890
  </footer>
</body>
<script src="<?=base_url('theme');?>/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('theme');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('theme');?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?=base_url('assets/select2/dist/js/select2.min.js');?>"></script>
<script src="<?=base_url('theme');?>/dist/js/adminlte.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#pegawai").select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Pegawai"
    });

    $("#kota2").select2({
        theme: 'bootstrap4',
        placeholder: "Please Select"
    });
});


$(document).ready(function() {
    $("#kecamatan").select2({
        ajax: {
            url: '<?= base_url() ?>dashboard/getdatakec/',
            type: "post",
            dataType: 'json',
            delay: 200,
            data: function(params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
});

$("#kecamatan").change(function() {
    var id_kec = $("#kecamatan").val();
    $("#kelurahan").select2({
        ajax: {
            url: '<?= base_url() ?>dashboard/getdatakel/' + id_kec,
            type: "post",
            dataType: 'json',
            delay: 200,
            data: function(params) {
                return {
                    searchTerm: params.term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
});

</script>
</body>
</html>