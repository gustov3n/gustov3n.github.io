<?php if (!empty($bengkel)): ?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<h6><i class="fas fa-fw fa-sync text-primary"></i> TAHAP 1</h6>
			</div>
			<div class="card-body">
				<form method="post" action="<?=base_url('master/ubahbengkel/2/'.$noreg);?>">
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">KATEGORI</label>
				    <div class="col-sm-4">
				    	<select class="form-control form-control-sm" name="kategori">
				    		<option value="">-</option>
				        	<?php foreach ($kategori as $kat): ?>
							<option <?php if($kat['kode_kategori']==$bengkel['kategori_kode']){echo 'selected';} ?> value="<?=$kat['kode_kategori'];?>"><?='['.$kat['kode_kategori'].'] '.$kat['nama_kategori'];?></option>        		
				        	<?php endforeach ?>
				    	</select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">NAMA BENGKEL</label>
				    <div class="col-sm-4">
				      <input required type="text" name="bengkel" value="<?=$bengkel['nama_bengkel'];?>" class="form-control form-control-sm">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">NAMA PEMILIK</label>
				    <div class="col-sm-4">
				      <input required type="text" name="pemilik" value="<?=$bengkel['nama_pemilik'];?>" class="form-control form-control-sm">
				    </div>
				  </div>

				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">HASHTAG</label>
				    <div class="col-sm-4">
						<textarea type="text" name="hashtag" class="form-control form-control-sm"><?=$bengkel['hashtag'];?></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-2">
				    	<a class="btn btn-sm btn-block btn-dark" href="<?=base_url('master/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
				    </div>
				    <div class="col-sm-2">
				      <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-fw fa-arrow-right text-white-50"></i> Selanjutnya</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php else: ?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<i class="fas fa-fw fa-sync text-primary"></i> TAHAP 1
			</div>
			<div class="card-body">
				<form method="post" action="<?=base_url('master/tambahbengkel/'.$noreg);?>">
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">KATEGORI</label>
				    <div class="col-sm-4">
				    	<select class="form-control form-control-sm" name="kategori">
				    		<option value="">-</option>
				        	<?php foreach ($kategori as $kat): ?>
							<option value="<?=$kat['kode_kategori'];?>"><?='['.$kat['kode_kategori'].'] '.$kat['nama_kategori'];?></option>        		
				        	<?php endforeach ?>
				    	</select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">NAMA BENGKEL</label>
				    <div class="col-sm-4">
				      <input required type="text" name="bengkel" class="form-control form-control-sm">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">NAMA PEMILIK</label>
				    <div class="col-sm-4">
				      <input required type="text" name="pemilik" class="form-control form-control-sm">
				    </div>
				  </div>

				  <div class="form-group row">
				    <label class="col-sm-2 col-form-label">HASHTAG</label>
				    <div class="col-sm-4">
						<textarea type="text" name="hashtag" class="form-control form-control-sm"></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-2">
				    	<a class="btn btn-sm btn-block btn-dark" href="<?=base_url('master/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
				    </div>
				    <div class="col-sm-2">
				      <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-fw fa-arrow-right text-white-50"></i> Selanjutnya</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endif ?>
