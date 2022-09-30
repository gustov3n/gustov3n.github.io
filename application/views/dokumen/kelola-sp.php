<div class="row mb-3">
	<div class="col">
		<a class="btn btn-sm btn-dark" href="<?=base_url('dokumen/sp');?>"><i class="fas fa-fw fa-arrow-circle-left text-white-50"></i> Kembali</a>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card">
		  <div class="card-header">
		    <i class="fas fa-fw fa-users"></i> Pegawai
		  </div>
		  <div class="card-body">
		  	<div class="row">
		  		<div class="col">
					<form method="post" action="<?=base_url('dokumen/tambahanggotasp/'.$idsp);?>">
						<div class="form-group row">
						<div class="col-sm-10">
							<select id="pegawai" name="pegawai" class="form-control">
								<option></option>
								<?php foreach ($pegawai as $row): ?>
									<option value="<?=$row['nip'];?>"><?=$row['namapegawai'];?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-1">
							<button class="btn btn-sm btn-primary" type="submit"><i class="fas fa-fw fa-check"></i></button>
						</div>
						</div>
					</form>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col">
    				<table class="table table-sm table-responsive-sm table-hover table-striped bg-white table-bordered">
		  				<thead>
		  					<tr>
		  						<th class="text-center">NO</th>
		  						<th class="text-center">NIP</th>
		  						<th class="text-center">NAMA</th>
		  						<th class="text-center">PPP</th>
		  					</tr>
		  				</thead>
		  				<tbody>
		  					<?php $no=0; foreach ($anggota as $row): $no++; ?>
		  						<tr>
		  							<td class="text-center"><?=$no;?></td>
		  							<td class="text-center"><?=$row['nip'];?></td>
		  							<td class="text-center"><?=$row['namapegawai'];?></td>
		  							<td class="text-center">
		  								<?php if ($row['ppp']==1): ?>
		  									<a href="<?=base_url('dokumen/pppsp/'.$idsp.'/'.$row['nip']);?>"><i class="fas fa-fw fa-toggle-on text-teal"></i></a>
		  								<?php else: ?>
		  									<a href="<?=base_url('dokumen/pppsp/'.$idsp.'/'.$row['nip']);?>"><i class="fas fa-fw fa-toggle-off text-secondary"></i></a>
		  								<?php endif ?>
		  							</td>
		  						</tr>
		  					<?php endforeach ?>
		  				</tbody>
		  			</table>
		  		</div>
		  	</div>
		  </div>
		</div>
	</div>
	<div class="col">
		<div class="card">
		  <div class="card-header">
		    <i class="fas fa-fw fa-users"></i> Tujuan
		  </div>
		  <div class="card-body">
		  	<div class="row mb-3">
		  		<div class="col">
		  			<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-fw fa-plus text-white-50"></i> Tambah Tujuan</button>
		  		</div>
		  	</div>
		  	<div class="row">
		  		<div class="col">
    				<table class="table table-sm table-responsive-sm table-hover table-striped bg-white table-bordered">
		  				<thead>
		  					<tr>
		  						<th class="text-center">URUTAN</th>
		  						<th class="text-center">TUJUAN</th>
		  						<th class="text-center">TGL AWAL</th>
		  						<th class="text-center">TGL AKHIR</th>
		  						<th class="text-center"><i class="fas fa-fw fa-cog"></i></th>
		  					</tr>
		  				</thead>
		  				<tbody>
		  					<?php foreach ($tujuan as $row): ?>
		  						<tr>
		  							<td class="text-center"><?=$row['no_tujuan'];?></td>
		  							<td class="text-center text-primary"><span style="cursor:pointer;" data-toggle="modal" data-target="<?='#modalEdit'.$row['id_spt'];?>"><?=$row['lokasi_tujuan'];?></span></td>
		  							<td class="text-center"><?=tanggal($row['tgl_awal']);?></td>
		  							<td class="text-center"><?=tanggal($row['tgl_akhir']);?></td>
		  							<td>
		  								<a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?=base_url('dokumen/hapustujuansp/'.$idsp.'/'.$row['id_spt']);?>"><i class="fas fa-fw fa-trash-alt"></i></a>
		  							</td>
		  						</tr>
		  					<?php endforeach ?>
		  				</tbody>
		  			</table>
		  		</div>
		  	</div>
		  </div>
		</div>		
	</div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Tujuan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('dokumen/tambahtujuansp/'.$idsp);?>">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Urutan Tujuan</label>
        <div class="col-sm-9">
          <select type="text" name="urutan" class="form-control form-control-sm" required>
            <option>-</option>
            <option value="I">I</option>
            <option value="II">II</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
            <option value="V">V</option>
            <option value="VI">VI</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tgl Awal</label>
        <div class="col-sm-9">
          <input type="date" name="tglawal" class="form-control form-control-sm" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tgl Akhir</label>
        <div class="col-sm-9">
          <input type="date" name="tglakhir" class="form-control form-control-sm" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Lokasi Tujuan</label>
        <div class="col-sm-9">
          <textarea name="tujuan" class="form-control form-control-sm"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
        </div>
        <div class="col-sm-3">
          <button type="reset" class="btn btn-dark btn-block btn-sm"><i class="fas fa-fw fa-sync text-white-50"></i> Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>

<!-- MODAL EDIT -->

<?php if (!empty($tujuan)): ?>
<?php foreach ($tujuan as $row): ?>
<div class="modal fade" id="<?='modalEdit'.$row['id_spt'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Ubah Tujuan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('dokumen/ubahtujuansp/'.$idsp.'/'.$row['id_spt'].'/'.$row['no_tujuan']);?>">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Urutan Tujuan</label>
        <div class="col-sm-9">
          <select type="text" name="urutan" class="form-control form-control-sm" required>
            <option>-</option>
            <option <?php if($row['no_tujuan']=='I'){echo 'selected';} ?> value="I">I</option>
            <option <?php if($row['no_tujuan']=='II'){echo 'selected';} ?> value="II">II</option>
            <option <?php if($row['no_tujuan']=='III'){echo 'selected';} ?> value="III">III</option>
            <option <?php if($row['no_tujuan']=='IV'){echo 'selected';} ?> value="IV">IV</option>
            <option <?php if($row['no_tujuan']=='V'){echo 'selected';} ?> value="V">V</option>
            <option <?php if($row['no_tujuan']=='VI'){echo 'selected';} ?> value="VI">VI</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tgl Awal</label>
        <div class="col-sm-9">
          <input type="date" name="tglawal" value="<?=$row['tgl_awal'];?>" class="form-control form-control-sm" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Tgl Akhir</label>
        <div class="col-sm-9">
          <input type="date" name="tglakhir" value="<?=$row['tgl_akhir'];?>" class="form-control form-control-sm" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Lokasi Tujuan</label>
        <div class="col-sm-9">
          <textarea name="tujuan" class="form-control form-control-sm"><?=$row['lokasi_tujuan'];?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
        </div>
        <div class="col-sm-3">
          <button type="reset" class="btn btn-dark btn-block btn-sm"><i class="fas fa-fw fa-sync text-white-50"></i> Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<?php endforeach ?>
<?php endif ?>

