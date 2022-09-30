<div class="row mb-3">
	<div class="col-2">
		<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('data/bengkelku');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col">
            <div class="card card-light card-tabs text-md">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link <?php if($sheet==1){echo 'active';} ?>" href="<?=base_url('data/kelolabengkelku/1/'.$noreg);?>">Profil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($sheet==2){echo 'active';} ?>" href="<?=base_url('data/kelolabengkelku/2/'.$noreg);?>">Layanan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($sheet==3){echo 'active';} ?>" href="<?=base_url('data/kelolabengkelku/3/'.$noreg);?>">Fasilitas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link <?php if($sheet==4){echo 'active';} ?>" href="<?=base_url('data/kelolabengkelku/4/'.$noreg);?>">Foto</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                     Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                     Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>	
<!-- 		<div class="card">
			<div class="card-header">
			<i class="fas fa-fw fa-user"></i> Profil Bengkel
			</div>
			<div class="card-body">
				<form action="<?=base_url('data/ubahdatabengkel/'.$noreg);?>" method="post">
				  <div class="form-group">
				    <label>1. Kategori</label>
			    	<select class="form-control form-control-sm" name="kategori">
			    		<option value="">-</option>
			        	<?php foreach ($kategori as $kat): ?>
						<option <?php if($kat['kode_kategori']==$bengkel['kategori_kode']){echo 'selected';} ?> value="<?=$kat['kode_kategori'];?>"><?='['.$kat['kode_kategori'].'] '.$kat['nama_kategori'];?></option>        		
			        	<?php endforeach ?>
			    	</select>
				  </div>
				  <div class="form-group">
				    <label>2. Nama Bengkel</label>
				    <input name="bengkel" value="<?=$bengkel['nama_bengkel'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>3. Nama Pemilik</label>
				    <input name="pemilik" value="<?=$bengkel['nama_pemilik'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>4. Alamat Bengkel</label>
				    <textarea name="alamat" class="form-control form-control-sm"><?=$bengkel['nama_bengkel'];?></textarea>
				  </div>
				  <div class="form-group">
				    <label>5. Kecamatan</label>
				    <select id="kecamatan" name="kecamatan" class="form-control form-control-sm select2">
				        <option value="" selected>Pilih Kecamatan</option>
				    </select>
				  </div>
				  <div class="form-group">
				    <label>6. Kelurahan</label>
					<select id="kelurahan" name="kelurahan" class="<?=$tools['input'];?> select2">
					  <option value="" selected>Pilih Kelurahan</option>
					</select>
				  </div>
				  <div class="form-group">
				    <label>7. Peta</label>
				    <input name="peta" value="<?=$bengkel['peta'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>8. No. Telp</label>
				    <input name="notelp" value="<?=$bengkel['no_telp'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>9. Hashtag</label>
				    <textarea name="hashtag" class="form-control form-control-sm"><?=$bengkel['nama_bengkel'];?></textarea>
				  </div>
				  <div class="form-group">
				  	<div class="row">
				  		<div class="col-2">
				  			<button type="submit" class="btn btn-block btn-sm btn-primary"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
				  		</div>
				  		<div class="col-2">
				  			<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('data/bengkel');?>"><i class="fas fa-fw fa-times text-white-50"></i> Batal</a>
				  		</div>
				  	</div>
				  </div>
				</form>
			</div>
		</div> -->
	</div>
</div>
<!-- <div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<i class="fas fa-fw fa-image"></i> Foto Bengkel
			</div>
			<div class="card-body">
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
				</div>
			</div>
		</div>
	</div>
</div> -->
