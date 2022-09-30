<div class="row mb-3">
	<div class="col-2">
		<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('laporan/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col">
        <div class="card card-light card-tabs text-md">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link <?php if($sheet==1){echo 'active';} ?>" href="<?=base_url('laporan/databengkel/1/'.$noreg);?>">Profil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($sheet==2){echo 'active';} ?>" href="<?=base_url('laporan/databengkel/2/'.$noreg);?>">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($sheet==3){echo 'active';} ?>" href="<?=base_url('laporan/databengkel/3/'.$noreg);?>">Fasilitas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php if($sheet==4){echo 'active';} ?>" href="<?=base_url('laporan/databengkel/4/'.$noreg);?>">Foto</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active">
				<table class="table table-sm table-responsive-sm table-hover table-striped bg-white table-bordered">
					<thead class="thead-dark">
						<tr>
							<th>NO</th>
							<th>PELAYANAN</th>
							<th><i class="fas fa-fw fa-cogs"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php $no=0; foreach ($pelayanan as $row): $no++; ?>
							<tr>
								<td><?=$no;?></td>
								<td><?=$row['nama_ply'];?></td>
								<td>
									<?php 
										$ceklayanan=$this->layanan->getLayananSet($row['id_ply'],$noreg);
									?>
									<?php if (!empty($ceklayanan)): ?>
										<a href="<?=base_url('laporan/hapuslayananbengkel/'.$noreg.'/'.$row['id_ply']);;?>"><i class="fas fa-fw fa-toggle-on text-teal"></i></a>
									<?php else: ?>
										<a href="<?=base_url('laporan/tambahlayananbengkel/'.$noreg.'/'.$row['id_ply']);;?>"><i class="fas fa-fw fa-toggle-off text-dark"></i></a>
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
</div>