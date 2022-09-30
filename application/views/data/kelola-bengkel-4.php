<div class="row mb-3">
	<div class="col-2">
		<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('data/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col">
	    <div class="card card-light card-tabs text-md">
	      <div class="card-header p-0 pt-1">
	        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link <?php if($sheet==1){echo 'active';} ?>" href="<?=base_url('data/kelolabengkel/1/'.$noreg);?>">Profil</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link <?php if($sheet==2){echo 'active';} ?>" href="<?=base_url('data/kelolabengkel/2/'.$noreg);?>">Layanan</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link <?php if($sheet==3){echo 'active';} ?>" href="<?=base_url('data/kelolabengkel/3/'.$noreg);?>">Fasilitas</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link <?php if($sheet==4){echo 'active';} ?>" href="<?=base_url('data/kelolabengkel/4/'.$noreg);?>">Foto</a>
	          </li>
	        </ul>
	      </div>
	      <div class="card-body">
	        <div class="tab-content" id="custom-tabs-one-tabContent">
	          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
				<div class="row">
					<div class="col">
						<form method="post" enctype="multipart/form-data" action="<?=base_url('data/upload/'.$noreg);?>">
							<div class="form-group row">
								<div class="col-sm-4">
									<input type="file" name="file" class="form-control-file form-control-sm">
									<input type="hidden" name="id" class="form-control-file form-control-sm" value="<?=$bengkel['id_bengkel'];?>">
								</div>
								<div class="col-sm-2">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-upload text-white-50"></i> Upload</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
				<?php foreach ($foto as $row): ?>
					<div class="col-3 d-flex justify-content-center p-3">
						<img style="cursor: pointer;" data-toggle="modal" data-target="<?='#opsi'.$row['id_foto'];?>" class="border border-primary" width="100%" src="<?=base_url('uploads/'.$row['nama_file']);?>" alt="Foto">
					</div>
				<?php endforeach ?>
				</div>
<!-- 				<div class="row">
					<div class="col-4"></div>
					<?php if (!empty($jmlfoto)):?>
					<div class="col-4 p-3 border border-dark d-flex align-item-center justify-content-center">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <?php for ($i=0; $i < $jmlfoto; $i++) { 
						    	?><li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>"></li><?php
						    } ?>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img width="256px" src="<?=base_url('uploads/'.$fotoaktif['nama_file']);?>" alt="First slide">
						    </div>
						    <?php foreach ($foto as $rf): ?>
							    <div class="carousel-item">
							      <img width="256px" src="<?=base_url('uploads/'.$rf['nama_file']);?>" alt="Second slide">
							    </div>
						    <?php endforeach ?>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<?php else: ?>
						<div class="col border border-danger"><h3 class="text-danger text-center">Foto tidak ditemukan</h3></div>
					<?php endif ?>
					<div class="col-4"></div>
				</div> -->
	          </div>
	        </div>
	      </div>
	    </div>	
	</div>
</div>

<?php foreach ($foto as $mfoto): ?>
<div class="modal fade" id="<?='opsi'.$mfoto['id_foto'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="opsiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="opsiLabel">Opsi Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col">
      			<img width="100%" src="<?=base_url('uploads/'.$mfoto['nama_file']);?>" alt="Foto">
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
		<a onclick="return confirm('Anda yaking ingin menghapus data ini?')" href="<?=base_url('data/hapusfoto/'.$mfoto['id_foto'].'/'.$noreg);?>" class="btn btn-sm btn-danger" href=""><i class="fas fa-fw fa-trash-alt text-white-50"></i> Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>