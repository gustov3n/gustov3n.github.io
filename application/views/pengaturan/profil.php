<div class="row mb-3">
	<!-- <div class="col-sm-9 mb-sm-0 mb-sm-3">
		<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-fw fa-plus text-white-50"></i> Tambah Loket</a>
	</div> -->
	<div class="col-sm-3 mb-sm-0 mb-sm-3 d-flex justify-content-end">
		<form action="" method="post">
		  <div class="form-row">
		    <div class="col-sm-8 mb-sm-0 mb-sm-3">
		      <input type="text" autofocus name="cari_s" value="<?= $cari_s ;?>" class="form-control form-control-sm" placeholder="Cari">
		    </div>
		    <div class="col-sm-2 mb-sm-0 mb-sm-3">
		      <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Cari"><i class="fas fa-fw fa-search text-white-50"></i></button>
		    </div>
		    <div class="col-sm-2 mb-sm-0 mb-sm-3">
		      <a href="<?= base_url('pengaturan/reset/pengaturan/profil');?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Reset Pencarian"><i class="fas fa-fw fa-sync text-white-50"></i></a>
		    </div>
		  </div>
		</form>
	</div>
</div>

<?php if (!empty($profil)): ?>

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
      <thead style="background-color:#95D1CC;">
        <tr>
          <th class="text-center align-middle">#</th>
          <th class="text-center align-middle">Nama Profil</th>
          <th class="text-center align-middle">Nama Instansi</th>
          <th class="text-center align-middle">Alamat</th>
          <th class="text-center align-middle" colspan="2"><i class="fas fa-fw fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach ($profil as $row): $no++; ?>
          <tr>
            <td class="text-center align-middle"><?=$no;?></td>
            <td class="text-center align-middle"><?=$row['nama_profil'];?></td>
            <td class="text-center align-middle"><?=$row['nama_instansi'];?></td>
            <td class="text-center align-middle"><?=$row['alamat_instansi'];?></td>
            <td class="text-center align-middle"><a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?= base_url('pengaturan/ubahprofil/'.$row['id_profil']);?>"><i class="fas fa-fw fa-pen text-danger"></i></a></td>
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
  <div class="modal-header">
    <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Module</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('developer/tambahmodule');?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input type="text" name="judul" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Url</label>
        <div class="col-sm-10">
          <input type="text" name="url" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Icon</label>
        <div class="col-sm-10">
          <input type="text" name="icon" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
          <button type="reset" class="btn btn-dark btn-sm"><i class="fas fa-fw fa-sync text-white-50"></i> Reset</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>