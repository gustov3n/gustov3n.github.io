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
  <style type="text/css">
    body
    {
      background-image: url('<?=base_url('assets/img/bengkel1.jpg');?>');
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
<body style="background-color:#F6F2D4;" class="hold-transition layout-footer-fixed layout-top-nav">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="<?=base_url($this->session->userdata('default_page'))?>" class="nav-link">Home</a> -->
        <b>S I B O S</b>
        <!-- <b>Sistem Informasi Bengkel Online + Sparepart</b> -->
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <?php if (!empty($this->session->userdata('username'))): ?>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?=base_url($this->session->userdata('default_page'))?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a data-toggle="modal" data-target="#logoutModal" href="#" class="nav-link">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#loginModal">Login</a>
          </li>
        <?php endif ?>
          <li class="nav-item">
            <?php
              if($this->session->flashdata('notifikasi')){
                echo $this->session->flashdata('notifikasi');
              }
            ?>
          </li>
    </ul>
  </nav>
</div>

<div class="row p-3">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-fw fa-search"></i> Pencarian
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <form action="" method="post">
              <div class="form-group">
              <label>Cari</label>
              <input autofocus type="text" name="cari_s" value="<?=$cari_s;?>" class="form-control form-control-sm">
              </div>
              <div class="form-group">
              <label>Kategori</label>
                <select name="kategori_s" class="form-control form-control-sm">
                  <option value="">Semua</option>
                  <?php foreach ($kategori as $row): ?>
                    <option <?php if($kategori_s==$row['kode_kategori']){echo 'selected';} ?> value="<?=$row['kode_kategori'];?>"><?=$row['nama_kategori'];?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group">
                <label>KECAMATAN</label>
                <select id="kecamatan" name="kecamatan_s" class="form-control form-control-sm select2">
                  <?php 
                    if (!empty($this->session->userdata('sess_kecamatan'))) {
                      $kec=$this->daerah->getKecById($this->session->userdata('sess_kecamatan'));
                      ?>
                      <option value="<?=$kecamatan_s;?>"><?=$kec['nama_kec'];?></option>
                      <?php
                    }else{
                      ?>
                      <option value="" selected>Semua</option>
                      <?php
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label>KELURAHAN</label>
                <select id="kelurahan" name="kelurahan_s" class="form-control form-control-sm select2">
                  <?php 
                    if (!empty($this->session->userdata('sess_kelurahan'))) {
                      $kec=$this->daerah->getKelById($this->session->userdata('sess_kelurahan'));
                      ?>
                      <option value="<?=$kelurahan_s;?>"><?=$kec['nama_kel'];?></option>
                      <?php
                    }else{
                      ?>
                      <option value="" selected>Semua</option>
                      <?php
                    }
                  ?>
                </select>
              </div>
              <button type="submit" class="btn btn-sm btn-primary">Terapkan</button>
              <a class="btn btn-sm btn-dark" href="<?=base_url('dashboard/reset/dashboard/index');?>">Reset</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm">
    <?php if (!empty($bengkel)): ?>
    <div class="row">
      <?php foreach ($bengkel as $row): ?>
        <div class="col-md-4">
        <!-- <div class="col-12 col-sm-6 col-md-3"> -->
          <div style="cursor:pointer;" class="info-box" data-toggle="modal" data-target="<?='#bengkel'.$row['id_bengkel'];?>">
            <?php if ($row['kode_kategori']=='R2'): ?>
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-motorcycle"></i></span>
            <?php else: ?>
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-car"></i></span>
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

<!-- MODAL LOGIN -->

<div class="modal fade" id="loginModal" data-backdrop="static" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm">
            <form action="<?=base_url('auth');?>" method="post">
              <div class="input-group">
                <input autofocus type="text" class="form-control" name="username" placeholder="Username" value="<?=set_value('username');?>">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-fw fa-user"></span>
                  </div>
                </div>
              </div>
            <div class="input-group mb-3">
            <?=form_error('username','<small class="text-danger pl-3">','</small>');?>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-fw fa-key"></span>
                </div>
              </div>
            </div>
            <div class="input-group">
            <?=form_error('password','<small class="text-danger pl-3">','</small>');?>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-danger btn-block">Login</button>
              </div>
              <!-- /.col -->
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- LOGOUT MODAL -->

<div class="modal fade" id="logoutModal" data-backdrop="static" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
          <div class="col-sm">
            Anda Yakin ingin mengakhiri sesi?
          </div>
        </div>
        <div class="row">
          <div class="col">
              <a class="btn btn-block btn-sm btn-danger" href="<?=base_url('auth/logout');?>"><i class="fas fa-fw fa-sign-out-alt text-white-50"></i> YA</a>            
          </div>
          <div class="col">
              <a class="btn btn-block btn-sm btn-dark" data-dismiss="modal"><i class="fas fa-fw fa-times text-white-50"></i> TIDAK</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DETAIL BENGKEL -->
<?php if (!empty($bengkel)): ?>
  <?php foreach ($bengkel as $row): ?>
  <div class="modal fade" id="<?='bengkel'.$row['id_bengkel'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="<?='bengkel'.$row['id_bengkel'];?>Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?='bengkel'.$row['id_bengkel'];?>Label"><i class="fas fa-fw fa-info"></i> Data Bengkel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $row['nama_bengkel']; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach ?>
<?php endif ?>


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