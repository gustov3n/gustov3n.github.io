<div class="row mb-3">
	<div class="col-2">
		<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('master/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<i class="fas fa-fw fa-user"></i> Profil Bengkel
			</div>
			<div class="card-body">
				<form action="<?=base_url('master/tambahdatabengkel/'.$noreg);;?>" method="post">
				  <div class="form-group">
				    <label>1. Kategori</label>
			    	<select class="form-control form-control-sm" name="kategori">
			    		<option value="">-</option>
			        	<?php foreach ($kategori as $kat): ?>
						<option value="<?=$kat['kode_kategori'];?>"><?='['.$kat['kode_kategori'].'] '.$kat['nama_kategori'];?></option>        		
			        	<?php endforeach ?>
			    	</select>
				  </div>
				  <div class="form-group">
				    <label>2. Nama Bengkel</label>
				    <input name="bengkel" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>3. Nama Pemilik</label>
				    <input name="pemilik" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>4. Alamat Bengkel</label>
				    <textarea name="alamat" class="form-control form-control-sm"></textarea>
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
				    <input name="peta" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>8. No. Telp</label>
				    <input name="notelp" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>9. Hashtag</label>
				    <textarea name="hashtag" class="form-control form-control-sm"></textarea>
				  </div>
				  <div class="form-group">
				  	<div class="row">
				  		<div class="col-2">
				  			<button type="submit" class="btn btn-block btn-sm btn-primary"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
				  		</div>
				  		<div class="col-2">

				  		</div>
				  	</div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>