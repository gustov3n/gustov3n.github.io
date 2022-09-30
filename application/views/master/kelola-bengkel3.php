<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<h6><i class="fas fa-fw fa-sync text-primary"></i> TAHAP 3</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<form method="post" enctype="multipart/form-data" action="<?=base_url('master/upload/3/'.$noreg);?>">
							<div class="form-group row">
								<div class="col-sm-4">
									<input type="file" name="file" class="form-control-file form-control-sm">
								</div>
								<div class="col-sm-2">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-upload text-white-50"></i> Upload</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-2">
						<a class="btn btn-sm btn-block btn-dark" href="<?=base_url('master/kelolabengkel/2/'.$noreg);?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
					</div>
					<div class="col-2">
						<a class="btn btn-sm btn-block btn-primary" href="<?=base_url('master/bengkel');?>"><i class="fas fa-fw fa-save text-white-50"></i> Selesai</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>