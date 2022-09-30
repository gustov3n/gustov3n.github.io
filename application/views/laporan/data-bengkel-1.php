<div class="row mb-3">
	<div class="col-2">
		<a class="btn btn-block btn-sm btn-dark" href="<?=base_url('laporan/bengkel');?>"><i class="fas fa-fw fa-arrow-left text-white-50"></i> Kembali</a>
	</div>
</div>
<!-- <div class="row">
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
				  <div class="form-group">
				    <label>1. Kategori</label>
			    	<select disabled class="form-control form-control-sm" name="kategori">
			    		<option value="">-</option>
			        	<?php foreach ($kategori as $kat): ?>
						<option <?php if($kat['kode_kategori']==$bengkel['kategori_kode']){echo 'selected';} ?> value="<?=$kat['kode_kategori'];?>"><?='['.$kat['kode_kategori'].'] '.$kat['nama_kategori'];?></option>        		
			        	<?php endforeach ?>
			    	</select>
				  </div>
				  <div class="form-group">
				    <label>2. Nama Bengkel</label>
				    <input disabled name="bengkel" value="<?=$bengkel['nama_bengkel'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>3. Nama Pemilik</label>
				    <input disabled name="pemilik" value="<?=$bengkel['nama_pemilik'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>4. Alamat Bengkel</label>
				    <textarea disabled name="alamat" class="form-control form-control-sm"><?=$bengkel['alamat_bengkel'];?></textarea>
				  </div>
				  <div class="form-group">
				    <label>5. Kecamatan</label>
				    <select class="form-control form-control-sm">
				    	<?php foreach ($keca as $rkec): ?>
				    		<option <?php if($rkec['id_kec']==$bengkel['kec_id']){echo 'selected';} ?>><?=$rkec['nama_kec'];?></option>
				    	<?php endforeach ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label>6. Kelurahan</label>
				    <select class="form-control form-control-sm">
				    	<?php foreach ($kelu as $rkelu): ?>
				    		<option <?php if($rkelu['id_kec']==$bengkel['kec_id']){echo 'selected';} ?>><?=$rkec['nama_kec'];?></option>
				    	<?php endforeach ?>
				    </select>
				  </div>
				  <div class="form-group">
				    <label>7. Peta</label>
				    <input disabled name="peta" value="<?=$bengkel['peta'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>8. No. Telp</label>
				    <input disabled name="notelp" value="<?=$bengkel['no_telp'];?>" type="text" class="form-control form-control-sm">
				  </div>
				  <div class="form-group">
				    <label>9. Hashtag</label>
				    <textarea disabled name="hashtag" class="form-control form-control-sm"><?=$bengkel['hashtag'];?></textarea>
				  </div>
	          </div>
	        </div>
	      </div>
	    </div>	
	</div>
</div> -->
<!-- <div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
			<i class="fas fa-fw fa-image"></i> Foto Bengkel
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<form method="post" enctype="multipart/form-data" action="<?=base_url('laporan/upload/'.$noreg);?>">
							<div class="form-group row">
								<div class="col-sm-4">
									<input type="file" name="file" class="form-control-file form-control-sm">
									<input type="hidden" name="id" class="form-control-file form-control-sm" value="<?=$bengkel['id_bengkel'];?>">
								</div>
								<div class="col-sm-2">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-upload text-white-50"></i> Upload</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-4"></div>
					<?php if (!empty($jmlfoto)):?>
					<div class="col-4 p-3 border border-dark d-flex align-item-center justify-content-center">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <ol class="carousel-indicators">
						    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						    <?php for ($i=0; $i < $jmlfoto; $i++) { 
						    	?><li data-target="#carouselExampleIndicators" data-slide-to="<?=$i;?>"></li><?php
						    } ?>
						  </ol>
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img width="256px" src="<?=base_url('uploads/'.$fotoaktif['nama_file']);?>" alt="First slide">
						    </div>
						    <?php foreach ($foto as $rf): ?>
							    <div class="carousel-item">
							      <img width="256px" src="<?=base_url('uploads/'.$rf['nama_file']);?>" alt="Second slide">
							    </div>
						    <?php endforeach ?>
						  </div>
						  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>
					</div>
					<?php else: ?>
						<div class="col border border-danger"><h3 class="text-danger text-center">Foto tidak ditemukan</h3></div>
					<?php endif ?>
					<div class="col-4"></div>
				</div>
			</div>
		</div>
	</div>
</div> -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                              <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>