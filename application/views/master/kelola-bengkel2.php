<?php if (!empty($bengkel)): ?>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<h6><i class="fas fa-fw fa-sync text-primary"></i> TAHAP 2</h6>
			</div>
			<div class="card-body">
				<form method="post" action="<?=base_url('master/ubahbengkel/3/'.$noreg);?>">
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">ALAMAT BENGKEL</label>
					<div class="col-sm-4">
						<textarea type="text" name="alamat" class="form-control form-control-sm"><?=$bengkel['alamat_bengkel'];?></textarea>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">KECAMATAN</label>
					<div class="col-sm-4">
					    <select id="kecamatan" name="kecamatan" class="form-control form-control-sm select2">
					        <option value="" selected>PILIH KECAMATAN</option>
					    </select>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">KELURAHAN</label>
					<div class="col-sm-4">
						<select id="kelurahan" name="kelurahan" class="<?=$tools['input'];?> select2">
						  <option value="" selected>PILIH KELURAHAN</option>
						</select>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">PETA</label>
					<div class="col-sm-4">
					  <input required type="text" name="peta" value="<?=$bengkel['peta'];?>" class="form-control form-control-sm">
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">NO. TELP</label>
					<div class="col-sm-4">
					  <input required type="text" name="notelp" value="<?=$bengkel['no_telp'];?>" class="form-control form-control-sm">
					</div>
					</div>
				  <div class="form-group row">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-2">
				    	<a class="btn btn-sm btn-block btn-dark" href="<?=base_url('master/kelolabengkel/1/'.$noreg);?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
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
			<h6><i class="fas fa-fw fa-sync text-primary"></i> TAHAP 2</h6>
			</div>
			<div class="card-body">
				<form method="post" action="<?=base_url('master/ubahbengkel/3/'.$noreg);?>">
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">ALAMAT BENGKEL</label>
					<div class="col-sm-4">
						<textarea type="text" name="alamat" class="form-control form-control-sm"></textarea>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">KECAMATAN</label>
					<div class="col-sm-4">
					    <select id="kecamatan" name="kecamatan" class="form-control form-control-sm select2">
					        <option value="" selected>PILIH KECAMATAN</option>
					    </select>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">KELURAHAN</label>
					<div class="col-sm-4">
						<select id="kelurahan" name="kelurahan" class="<?=$tools['input'];?> select2">
						  <option value="" selected>PILIH KELURAHAN</option>
						</select>
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">LAT/LONG</label>
					<div class="col-sm-2">
					  <input required type="text" name="lat" class="form-control form-control-sm">
					</div>
					<div class="col-sm-2">
					  <input required type="text" name="long" class="form-control form-control-sm">
					</div>
					</div>
					<div class="form-group row">
					<label class="col-sm-2 col-form-label">NO. TELP</label>
					<div class="col-sm-4">
					  <input required type="text" name="notelp" class="form-control form-control-sm">
					</div>
					</div>
				  <div class="form-group row">
				    <div class="col-sm-2"></div>
				    <div class="col-sm-2">
				    	<a class="btn btn-sm btn-block btn-dark" href="<?=base_url('master/kelolabengkel/1/'.$noreg);?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
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