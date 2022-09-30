<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>S A M - Sistem Antrian Multimedia</title>
  <link rel="stylesheet" href="<?=base_url('theme');?>/docs/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('theme');?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?=base_url('assets');?>/css/styles.css">
  <link rel="icon" href="<?=base_url('assets/img/logo.png');?>" type="image/ico">
  <style type="text/css">
  	body{
			background: url(<?=base_url('assets/img/silver.jpg');?>);
			background-repeat: no-repeat;
			background-size: cover;
  	}

		.playing {
		  background-color: green;
		}
  </style>
</head>
<body class="text-sm">
	<div class="container-fluid">
		<div class="row p-3 bg-olive">
			<div class="col-sm-1 d-flex justify-content-center align-item-center">
				<center><img width="50px" src="<?=base_url('assets/img/logo.png');?>"></center>
			</div>
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm">
						<h4><b><?=$profil['nama_instansi'];?></b></h4>
						<h5><b><?=$profil['alamat_instansi'];?></b></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div id="panggil"></div>
				<div id="tiket"></div>
				<div class="row mt-3">
					<div class="col-sm">
						<div id="antriantampil"></div>
					</div>
				</div>
				<div class="row p-2">
					<div class="col bg-teal shadow-sm p-3 mb-5 bg-white rounded border border-success">
						<center><div class="display-4"><b><?=tanggal(date('Y-m-d'));?></b></div></center><br><hr class="border border-secondary">
						<center><div class="display-4" id='jam'></div></center>
					</div>
				</div>
			</div>
			<div class="col-sm-8 bg-dark p-3">
				<center><video width="820px" height="480" autoplay controls id="Player" src="<?=base_url('video/1.mp4');?>" onclick="this.paused ? this.play() : this.pause();">Your browser does not support the video tag.</video></center>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col bg-olive border border-light">
				<marquee direction="left"><h4><?=$profil['rt'];?></h4></marquee>
			</div>
		</div>
	</div>

<!-- <div class="modal fade" id="panggil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div> -->
<script src="<?=base_url('theme');?>/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('theme');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('theme');?>/dist/js/adminlte.js"></script>

<script type="text/javascript">
setInterval(function(){
   $('#panggil').load('<?=base_url('tampilan/load');?>');
}, 2000)
setInterval(function(){
   $('#tiket').load('<?=base_url('tampilan/loadtiket');?>');
}, 2000)
setInterval(function(){
   $('#antriantampil').load('<?=base_url('tampilan/antriantampil');?>');
}, 2000)
</script>

<script>
    var myWindow;
    function openWin() {
      myWindow = window.open("https://inwepo.co", "_blank", "width=500, height=500");
    }
</script>
<script>
   function myPopup(myURL, title, myWidth, myHeight) {
      var left = (screen.width - myWidth) / 2;
      var top = (screen.height - myHeight) / 4;
      var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
   }
</script>

<script>
var nextsrc = [
	<?php 
		foreach ($video as $row) {
			// echo json_encode($row['path_video']).',';
		}
	?>
];
var elm = 0;
var Player = document.getElementById('Player');
var last   = document.getElementById('Player').attributes.src.value;
Player.onended = function(){
    if(++elm < nextsrc.length){         
         Player.src = nextsrc[elm];Player.play();
    }else if(elm=nextsrc.length){
         location.reload();
    }
}
</script>
<!-- <script> 
$(document).ready(function(){
	setInterval(function(){
	      $("#here").load(window.location.href + " #here" );
	}, 1000);
});
</script> -->
<script type="text/javascript">
	// 1 detik = 1000
	window.setTimeout("waktu()",1000);  
	function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("jam").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
	}
</script>
</body>
</html>
