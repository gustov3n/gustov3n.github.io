<div class="row">
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
          <a href="<?= base_url('laporan/reset/laporan/bengkel');?>" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Reset Pencarian"><i class="fas fa-fw fa-sync text-white-50"></i></a>
        </div>
      </div>
    </form>
  </div>
</div>

<?php if (!empty($bengkel)): ?>

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
          <th width="3%" class="text-center align-middle">#</th>
          <th width="7%" class="text-center align-middle">KATEGORI</th>
          <th width="20%" class="text-center align-middle">BENGKEL</th>
          <th width="30%" class="text-center align-middle">ALAMAT</th>
          <th width="30%" class="text-center align-middle">LAYANAN</th>
          <th width="10%" class="text-center align-middle" colspan="2"><i class="fas fa-fw fa-cogs"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php $no=0; foreach ($bengkel as $row): $no++; ?>
          <tr>
            <td class="text-center align-middle"><?=$no;?></td>
            <td class="text-center align-middle">
              <?php if ($row['kode_kategori']=='R2'): ?>
              	<i class="fas fa-fw fa-motorcycle fa-2x text-teal"></i>
              <?php else: ?>
              	<i class="fas fa-fw fa-car fa-2x text-maroon"></i>
              <?php endif ?>            	
            </td>
            <td class="text-left">
              <i class="fas fa-fw fa-check text-secondary"></i> <?='Nama Bengkel : '.$row['nama_bengkel'];?><br>
              <i class="fas fa-fw fa-check text-secondary"></i> <?='Nama Pemilik : '.$row['nama_pemilik'];?>
            </td>
            <td class="text-left align-middle"><?=$row['alamat_bengkel'].', '.$row['nama_kel'].', '.$row['nama_kec'];?></td>
            <td class="text-left">
              <?php 
                $this->db->select('*');
                $this->db->from('tbl_layananbengkel');
                $this->db->join('tbl_pelayanan','tbl_pelayanan.id_ply=tbl_layananbengkel.ply_id');
                $this->db->where('tbl_layananbengkel.noreg',$row['noreg']);
                $layanan=$this->db->get()->result_array();

                foreach ($layanan as $r_layanan) {
                  ?><i class="fas fa-fw fa-check text-teal"></i> <?=$r_layanan['nama_ply'];
                }
              ?>
            </td>
            <td data-toggle="tooltip" data-placement="top" title="Peta" class="text-center align-middle">
              <?php if (!empty($row['peta'])): ?>
                <a target="_blank" href="<?=$row['peta'];?>"><i class="fas fa-fw fa-map"></i></a>
              <?php else: ?>
                <a href="#"><i class="fas fa-fw fa-map text-secondary"></i></a>
              <?php endif ?>
            </td>
            <td data-toggle="tooltip" data-placement="top" title="Kelola" class="text-center align-middle"><a href="<?=base_url('laporan/databengkel/'.$row['noreg']);?>"><i class="fas fa-fw fa-folder-open"></i></a></td>
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
    <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Bengkel</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('laporan/tambahbengkel');?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NO. REGISTRASI</label>
        <div class="col-sm-10">
          <input required type="text" readonly name="noreg" value="<?=$noreg;?>" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">KATEGORI</label>
        <div class="col-sm-10">
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
        <div class="col-sm-10">
          <input required type="text" name="bengkel" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NAMA PEMILIK</label>
        <div class="col-sm-10">
          <input required type="text" name="pemilik" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">ALAMAT BENGKEL</label>
        <div class="col-sm-10">
        	<textarea type="text" name="alamat" class="form-control form-control-sm"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">KECAMATAN</label>
        <div class="col-sm-10">
		    <select id="kecamatan" name="kecamatan" class="form-control form-control-sm select2">
		        <option value="" selected>PILIH KECAMATAN</option>
		    </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">KELURAHAN</label>
        <div class="col-sm-10">
			<select id="kelurahan" name="kelurahan" class="<?=$tools['input'];?> select2">
			  <option value="" selected>PILIH KELURAHAN</option>
			</select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">LAT/LONG</label>
        <div class="col-sm-5">
          <input required type="text" name="lat" class="form-control form-control-sm">
        </div>
        <div class="col-sm-5">
          <input required type="text" name="long" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">NO. TELP</label>
        <div class="col-sm-5">
          <input required type="text" name="notelp" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">HASHTAG</label>
        <div class="col-sm-10">
			<textarea type="text" name="hashtag" class="form-control form-control-sm"></textarea>
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

<?php if (!empty($bengkel)): ?>
<?php foreach ($bengkel as $row): ?>
<div class="modal fade" id="<?='modalEdit'.$row['noreg'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div style="background-color:#B22222;" class="modal-header text-light">
    <h5 class="modal-title" id="staticBackdropLabel">Form Ubah Module</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form method="post" action="<?=base_url('laporan/ubahbengkel/'.$row['noreg'].'/bengkel');?>">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Url</label>
        <div class="col-sm-10">
          <input required type="text" value="<?=$row['kategori_kode'];?>" name="kategori" class="form-control form-control-sm">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2"></div>
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

