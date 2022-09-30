<div class="row mb-3">
	<div class="col">
		<a class="btn btn-sm btn-dark" href="<?=base_url('master/bengkel');?>"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
	</div>
</div>

<div class="row">
	<div class="col">
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
								<a href="<?=base_url('master/hapuslayananbengkel/'.$noreg.'/'.$row['id_ply']);;?>"><i class="fas fa-fw fa-toggle-on text-teal"></i></a>
							<?php else: ?>
								<a href="<?=base_url('master/tambahlayananbengkel/'.$noreg.'/'.$row['id_ply']);;?>"><i class="fas fa-fw fa-toggle-off text-dark"></i></a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>