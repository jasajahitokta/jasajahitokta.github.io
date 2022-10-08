<?
error_reporting(0);
include "page/include/connect.php";
	if(!empty($_REQUEST[daftarpenjahit])==1)
		{
		$pass = md5($_REQUEST[pass]);
		$q1 = mysql_query("INSERT INTO penjahit SET nama='$_REQUEST[nama]',wa='$_REQUEST[wa]',pass='$pass'");
		
		if($q1)
			{
    		echo '<script>alert ("Pendaftaran Berhasil. Gunakan nomor HP dan password anda sebagai login.")</script>';
			print "<meta http-equiv='refresh' content='0;url=index.php?'/>";
			exit();
			}
		}
?>
<!DOCTYPE html>
<html>
<head>	
	<title>Daftar Penjahit | Cari Jasa Penjahit Terdekat</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="page/vendors/styles/style.css">
	<link rel="shortcut icon" href="images/favicon.png">

</head>
<body>
	<div class="login-wrap customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="login-box bg-white box-shadow pd-30 border-radius-5">
			<h5 style="text-align:center" class="text-danger"><b>DAFTAR PENJAHIT</b></h5>
			<img src="images/logo2.png" alt="login">
			<p style="text-align:center;margin-top:10px">Cari Jasa Penjahit Terdekat</p>
			
			<form method="post" action="" enctype="multipart/form-data">
			
				<p style="margin-bottom:0px">Nama</p>
				<div class="input-group custom input-group-lg">
					<input type="text" name="nama" required="" class="form-control" placeholder="Nama">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
			
				<p style="margin-bottom:0px">Nomor HP</p>
				<div class="input-group custom input-group-lg">
					<input type="text" name="wa" required="" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Nomor HP">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
				</div>
				
				<p style="margin-bottom:0px">Password</p>
				<div class="input-group custom input-group-lg">
					<input type="password" name="pass" required="" class="form-control" placeholder="Password">
					<div class="input-group-append custom">
						<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<input type="hidden" name="daftarpenjahit" value="1">
							<button class="btn btn-warning btn-block" type="submit" value="">Daftar</button>
						</div>
					</div>
					<div class="col-sm-12">
						<p style="font-size:12px">Jika anda sudah pernah mendaftar, anda dapat langsung masuk melalui halaman login. Silahakn Klik Tomobol "Login" dibawah ini.</p>
						<div class="input-group">
							<a href="index.php" style="width:100%">
								<button class="btn btn-danger btn-block" type="button">Login</button>
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