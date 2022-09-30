<div class="row mb-3">
	<div class="col-2">
		<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('laporan/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
	</div>
</div>
<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
			<?php if ($bengkel['kategori_kode']=='R2'): ?>
				<i class="fas fa-fw fa-motorcycle fa-6x text-primary"></i>
			<?php else: ?>
				<i class="fas fa-fw fa-car fa-6x text-primary"></i>
			<?php endif ?>
        </div>
        <h3 class="profile-username text-center"><?=$bengkel['nama_bengkel'];?></h3>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- About Me Box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Tentang</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <strong><i class="fas fa-user mr-1"></i> Pemilik</strong>
        <p class="text-muted">
        	<?=$bengkel['nama_pemilik'];?>
        </p>
        <hr>
        <strong><i class="fas fa-phone mr-1"></i> No. Telp</strong>
        <p class="text-muted">
        	<?=$bengkel['no_telp'];?>
        </p>
        <hr>
        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
        <p class="text-muted">
        	<a target="_blank" href="<?=$bengkel['peta'];?>"><?=$bengkel['alamat_bengkel'].', '.$bengkel['nama_kel'].', '.$bengkel['nama_kec'];?></a>
        </p>
        <hr>
        <strong><i class="fas fa-clock mr-1"></i> Operasional</strong>

        <p class="text-muted">
        	<?php foreach ($op as $row): ?>
        		<?php echo $row['hari']?> <i class="fas fa-fw fa-arrow-right"></i> <?=substr($row['jam_start'],0,5).' - '.substr($row['jam_stop'],0,5);?><br>
        	<?php endforeach ?>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active " href="#layanan" data-toggle="tab">Layanan</a></li>
          <li class="nav-item"><a class="nav-link" href="#fasilitas" data-toggle="tab">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="#foto" data-toggle="tab">Foto</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="layanan">
          	<?php $no=0; foreach ($layanan as $row): $no++; ?>
          		<?=$no.'. '.$row['nama_ply'];?>
          		<!-- <i class="fas fa-fw fa-check-circle text-secondary"></i> -->
          		<br>
          	<?php endforeach ?>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="fasilitas">
          	ON GOING
          </div>
          <!-- /.tab-pane -->

          <div class="tab-pane" id="foto">
			<div class="row">
			<?php foreach ($foto as $row): ?>
				<div class="col-3 d-flex justify-content-center">
					<img width="100%" src="<?=base_url('uploads/'.$row['nama_file']);?>">
				</div>
			<?php endforeach ?>
			</div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
