<div class="row">
	<div class="col-sm-9 mb-sm-0 mb-sm-3">
		<a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-fw fa-plus text-white-50"></i> Tambah Role</a>
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
		      <a href="<?= base_url('administrasi/reset/administrasi/role');?>" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Reset Pencarian"><i class="fas fa-fw fa-sync text-white-50"></i></a>
		    </div>
		  </div>
		</form>
	</div>
</div>

<?php if (!empty($role)): ?>

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
          <th class="text-center align-middle">Role</th>
          <th class="text-center align-middle">Default Page</th>
          <th class="text-center align-middle">All Data</th>
          <th class="text-center align-middle" colspan="3"><i class="fas fa-fw fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach ($role as $row): $no++; ?>
          <tr>
            <td class="text-center align-middle"><?=$no;?></td>
            <td class="text-center align-middle"><?=$row['role'];?></td>
            <td class="text-center align-middle">
              <?php if (!empty($row['default_page'])): ?>
                <span style="cursor: pointer;" class="text-primary" data-toggle="modal" data-target="<?='#modalPage'.$row['id_role'];?>"><?=$row['default_page'];?></span>
              <?php else: ?>
              <span style="cursor: pointer;" class="text-secondary" data-toggle="modal" data-target="<?='#modalPage'.$row['id_role'];?>"> <i>belum ditentukan</i> </span>              
              <?php endif ?>
            </td>
            <td class="text-center align-middle">
              <?php if ($row['all_data']==1):?>
                <a data-toggle="tooltip" data-placement="top" title="Aktif" href="<?=base_url('administrasi/alldata/0/'.$row['id_role']);?>"><i class="fas fa-fw fa-toggle-on text-teal"></i></a>
                <?php else: ?>
                <a data-toggle="tooltip" data-placement="top" title="Nonaktif" href="<?=base_url('administrasi/alldata/1/'.$row['id_role']);?>"><i class="fas fa-fw fa-toggle-off text-secondary"></i></a>
              <?php endif ?>
            </td>
            <td class="text-center align-middle"><a data-toggle="tooltip" data-placement="top" title="Pengaturan" href="<?= base_url('administrasi/roleset/'.$row['id_role']);?>"><i class="fas fa-fw fa-cog text-primary"></i></a></td>
            <td class="text-center align-middle">
              <a style="cursor: pointer;" data-toggle="modal" data-target="<?='#modalEdit'.$row['id_role'];?>"><i class="fas fa-fw fa-pen text-primary"></i></a>
            </td>
            <td class="text-center align-middle"><a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?= base_url('administrasi/hapusrole/'.$row['id_role']);?>"><i class="fas fa-fw fa-trash-alt text-primary"></i></a></td>
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
    <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Role</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('administrasi/tambahrole');?>">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
          <input required type="text" name="role" class="form-control form-control-sm">
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

<?php if (!empty($role)): ?>
<?php foreach ($role as $row): ?>
<div class="modal fade" id="<?='modalEdit'.$row['id_role'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Ubah Role</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('administrasi/ubahrole/'.$row['id_role']);?>">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
          <input required type="text" value="<?=$row['role'];?>" name="role" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<?php endforeach ?>
<?php endif ?>


<!-- MODAL PAGE -->

<?php if (!empty($role)): ?>
<?php foreach ($role as $row): ?>
<div class="modal fade" id="<?='modalPage'.$row['id_role'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Pilih Halaman Awal</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('administrasi/settinghomepage/'.$row['id_role']);?>">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Role</label>
        <div class="col-sm-9">
          <?php 
              $akses=$this->akses->getRoleById($row['id_role']);
          ?>
          <select name="home" class="form-control form-control-sm">
            <option>--Pilih Home Page--</option>
            <?php foreach ($akses as $r_akses): ?>
              <option value="<?=$r_akses['url_submodule'];?>" <?php if($r_akses['url_submodule']==$row['default_page']){echo 'selected';} ?>><?=$r_akses['title_submodule'];?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
          <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-fw fa-save text-white-50"></i> Simpan</button>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<?php endforeach ?>
<?php endif ?>
