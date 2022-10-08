<?
error_reporting(0);
include "page/include/connect.php";
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Cari Jasa Penjahit Terdekat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="page/vendors/styles/style.css">
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>


</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<h5 style="text-align:center" class="text-danger"><b>L O G I N</b></h5>
			<img src="images/logo2.png" alt="login">
			<p style="text-align:center;margin-top:10px">Cari Jasa Penjahit Terdekat</p>
			
			<form method="post" action="page/module/login.php" enctype="multipart/form-data">
				<div class="input-group custom input-group-lg">
					<input type="text" name="user" required="" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Nomor HP">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="input-group custom input-group-lg">
					<input type="password" name="pass" required="" class="form-control" placeholder="Password">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<button class="btn btn-warning btn-block" type="submit" value="">Masuk</button>
						</div>
					</div>
					<div class="col-sm-12">
						<p style="font-size:12px">Jika anda belum memiliki login, silahkan mengisi formulir pendaftaran dengan klik tombol "Daftar" dibawah ini.</p>
						<div class="input-group">
							<a href="daftarpencari.php" style="width:100%">
								<button class="btn btn-success btn-block" type="button">Daftar Sebagai Pencari</button>
							</a>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="input-group">
							<a href="daftarpenjahit.php" style="width:100%">
								<button class="btn btn-primary btn-block" type="button">Daftar Sebagai Penjahit</button>
							</a>
						</div>
					</div>
				</div>
			</form>
			
		</div>
	</div>
	
	<?php include('page/include/script.php'); ?>
</body>
<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        return true;
    }
</script>
</html>