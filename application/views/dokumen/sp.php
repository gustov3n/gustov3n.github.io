<div class="row">
  <div class="col-sm-9 mb-sm-0 mb-sm-3">
    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-fw fa-plus text-white-50"></i> Buat SPRINT</a>
  </div>
  <div class="col-sm-3 mb-sm-0 mb-sm-3 d-flex justify-content-end">
    <form action="" method="post">
      <div class="form-row">
        <div class="col-sm-8 mb-sm-0 mb-sm-3">
          <input type="text" autofocus name="cari_s" value="<?= $cari_s ;?>" class="form-control form-control-sm" placeholder="Cari">
        </div>
        <div class="col-sm-2 mb-sm-0 mb-sm-3">
          <button class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Cari"><i class="fas fa-fw fa-search text-white-50"></i></button>
        </div>
        <div class="col-sm-2 mb-sm-0 mb-sm-3">
          <a href="<?= base_url('dokumen/reset/dokumen/sp');?>" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Reset Pencarian"><i class="fas fa-fw fa-sync text-white-50"></i></a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if (!empty($sp)): ?>

<?php if ($count > 10): ?>
<div class="row">
  <div class="col-sm-9 text-gray">
    <?=halaman($count,$pagination['per_page'],$tools[3],$tools[3]+1);?>
  </div>
  <div class="col-sm-3 d-flex justify-content-end align-items-end">
      <nav aria-label="Page navigation example justify-content-end">
          <nav aria-label="Page navigation example">
              <?=$this->pagination->create_links();?>
          </nav>
      </nav>
  </div>
</div>
<?php endif ?>

<div class="row">
  <div class="col-sm">
    <table class="table table-sm table-responsive-sm table-hover table-striped bg-white table-bordered">
      <thead class="bg-dark">
      <!-- <thead style="background-color:#F1BC31;"> -->
        <tr>
          <th class="text-center align-middle">#</th>
          <th class="text-center align-middle">Create Date</th>
          <th class="text-center align-middle">No. SP</th>
          <th class="text-center align-middle">Keperluan</th>
          <th class="text-center align-middle" colspan="4"><i class="fas fa-fw fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach ($sp as $row): $no++; ?>
          <tr>
            <td class="text-center align-middle"><?=$no;?></td>
            <td class="text-center align-middle"><?=date('Y-m-d',strtotime($row['c_date']));?></td>
            <td class="text-center align-middle"><?=$row['no_sp'];?></td>
            <td class="text-center align-middle">
            	<?php 
            		$num_char=50;
					if ($row['keperluan'][$num_char - 1] != ' ') {
						$num_char = strpos($row['keperluan'], ' ', $num_char);
					}
            	?>
            	<span style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="<?=$row['keperluan'];?>"><?=substr($row['keperluan'], 0, $num_char) . '...';?></span>
        	</td>
          <td class="text-center align-middle">
            <a style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Kelola SP" href="<?=base_url('dokumen/kelolasp/'.$row['id_sp']);?>"><i class="fas fa-fw fa-cog text-primary"></i></a>
          </td>
          <td class="text-center align-middle"><a style="cursor: pointer;" target="_blank" href="<?=base_url('dokumen/cetaksp/'.$row['id_sp']);?>"><i class="fas fa-fw fa-print text-primary"></i></a></td>
          <td class="text-center align-middle">
            <a style="cursor: pointer;" data-toggle="modal" data-target="<?='#modalEdit'.$row['id_sp'];?>"><i class="fas fa-fw fa-pen text-primary"></i></a>
          </td>
          <td class="text-center align-middle"><a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?= base_url('dokumen/hapussp/'.$row['id_sp']);?>"><i class="fas fa-fw fa-trash-alt text-primary"></i></a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?php else: ?>

  <i class="text-secondary">Data tidak ditemukan.</i>

<?php endif ?>

<div class="modal fade" id="modalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Surat Perintah</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('dokumen/tambahsp');?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No SP</label>
        <div class="col-sm-2">
        	<input type="text" name="no1" value="090" class="form-control form-control-sm text-center">
        </div>
        <div class="col-sm-2">
        	<input type="text" name="no2" value="        " class="form-control form-control-sm text-center">
        </div>
        <div class="col-sm-2">
        	<input type="text" name="no3" value="5.3" class="form-control form-control-sm text-center">
        </div>
        <div class="col-sm-2">
        	<input type="text" name="no4" value="<?=date('Y');?>" class="form-control form-control-sm text-center">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Keperluan</label>
        <div class="col-sm-10">
        	<textarea rows="4" name="keperluan" class="form-control form-control-sm"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2"></div>
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

<?php if (!empty($sp)): ?>
<?php foreach ($sp as $row): ?>
<div class="modal fade" id="<?='modalEdit'.$row['id_sp'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Ubah Module</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  	<?php 
  		$nosp=explode('/',$row['no_sp']);
  	?>
    <form method="post" action="<?=base_url('dokumen/ubahsp/'.$row['id_sp']);?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">No SP</label>
        <div class="col-sm-2">
        	<input type="text" name="no1" value="<?=$nosp[0];?>" class="form-control form-control-sm text-center">
        </div>
        <div class="col-sm-2">
        	<input type="text" name="no2" value="<?=$nosp[1];?>" class="form-control form-control-sm text-center">
        </div>
        <div class="col-sm-2">
        	<input type="text" name="no3" value="<?=$nosp[2];?>" class="form-control form-control-sm text-center">
        </div>
        <div class="col-sm-2">
        	<input type="text" name="no4" value="<?=$nosp[3];?>" class="form-control form-control-sm text-center">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Keperluan</label>
        <div class="col-sm-10">
        	<textarea rows="4" name="keperluan" class="form-control form-control-sm"><?=$row['keperluan'];?></textarea>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2"></div>
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

