<div class="row">
  <div class="col-sm-9 mb-sm-0 mb-sm-3">
    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd"><i class="fas fa-fw fa-plus text-white-50"></i> Tambah</a>
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
          <a href="<?= base_url('master/reset/master/pegawai');?>" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Reset Pencarian"><i class="fas fa-fw fa-sync text-white-50"></i></a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if (!empty($pelayanan)): ?>

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
          <th class="text-center align-middle">KODE</th>
          <th class="text-center align-middle">PELAYANAN</th>
          <th class="text-center align-middle" colspan="2"><i class="fas fa-fw fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=$tools[3]; foreach ($pelayanan as $row): $no++; ?>
          <tr>
            <td class="text-center align-middle"><?=$no;?></td>
            <td class="text-center align-middle"><?=$row['kode_ply'];?></td>
            <td class="text-center align-middle"><?=$row['nama_ply'];?></td>
            <td class="text-center align-middle"><a style="cursor: pointer;" data-toggle="modal" data-target="<?='#modalEdit'.$row['id_ply'];?>"><i class="fas fa-fw fa-pen text-primary"></i></a></td>
            <td class="text-center align-middle"><a data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="<?= base_url('master/hapuspelayanan/'.$row['kode_ply']);?>"><i class="fas fa-fw fa-trash-alt text-primary"></i></a></td>
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
<div class="modal-dialog modal-lg">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Jenis Pelayanan</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('master/tambahpelayanan');?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">KODE</label>
        <div class="col-sm-10">
          <input required type="text" name="kode" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">PELAYANAN</label>
        <div class="col-sm-10">
          <input required type="text" name="nama" class="form-control form-control-sm">
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

<?php if (!empty($pelayanan)): ?>
<?php foreach ($pelayanan as $row): ?>
<div class="modal fade" id="<?='modalEdit'.$row['id_ply'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Ubah Module</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('master/ubahpelayanan/'.$row['id_ply']);?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">KODE</label>
        <div class="col-sm-10">
          <input required type="text" name="kode" value="<?=$row['kode_ply'];?>" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">PELAYANAN</label>
        <div class="col-sm-10">
          <input required type="text" name="nama" value="<?=$row['nama_ply'];?>" class="form-control form-control-sm">
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

