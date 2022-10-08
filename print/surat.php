<!DOCTYPE html>
<?
error_reporting(0);
include "../include/application_top.php";
include "../include/fungsi_indotgl1.php";

	$dCek2 = mysql_fetch_array(mysql_query("SELECT * FROM pengajuansurat WHERE idpengajuansurat='$_REQUEST[idpengajuansurat]'"));
	$dCek1 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[idpenduduk]'"));
	
	if($dCek2[jenissurat]=='Surat Keterangan Tidak Mampu (Sekolah)' || $dCek2[jenissurat]=='Surat Keterangan Tidak Mampu (BPJS)'){
		$jenissurat = "Surat Keterangan Tidak Mampu";
		}
	else{
		$jenissurat = $dCek2[jenissurat];
		}
?>
<html>
<style>
@media print {
html, body {
    width: 8.27in; /* was 9.5in */
    height: 9.5in; /* was 8.27in */
    display: block;
    /*font-size: auto; NOT A VALID PROPERTY */
}

@page {
    size: 8.27in 9.5in /* . Random dot? */;
}
}
</style>
<script>
window.print();
</script>
<head>	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>APLIKASI ADMINISTRASI DESA PASURUAN</title>

	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	
	<!-- CSS -->
	<link rel="stylesheet" href="../vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/media/css/responsive.dataTables.css">

</head>
<body>

	<table width="100%" style="font-size:12px">
		<tr>
			<td width="12%"><img src="../src/images/logo-lam-sel.png" width='80%'></td>
			<td align="center">
			</br>
				<h3>PEMERINTAH KABUPATEN LAMPUNG SELATAN</h3>
				<h2>KECAMATAN PENENGAHAN</h2>
				<h1>DESA PASURUAN</h1>
				</br>
				<p>Jl. Kediri Desa Pasuruan Kecamatan Penengahan - Lampung Selatan, Kode Pos 35591</p>
			</td>
		</tr>
	</table>
	
	<div class="clearfix"></div>
	<div style="border-bottom:2px #000 solid;margin-bottom: 2px"></div>
	<div style="border-bottom:1px #000 solid"></div>
	<div class="col-xs-12" style="text-align: center;margin:20px">
		<h5><b><u><?echo $jenissurat?></u></b></h5>	
		<p style="margin-top:0px">Nomor : <?echo $dCek2[nomorsurat]?></p>
	</div>
	
				<?
				if($dCek2[jenissurat]=="Surat Keterangan Domisili")
					{
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:50px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					
					<p>Nama tersebut diatas adalah benar berdomisili atau bertempat tinggal di Desa Pasuruan Kecamata Penengahan Kabupaten Lampung Setalan.</p>
					</br>
					<p>Demikian surat keterangan ini dibuat semoga dapat dipergunakan sebagaimana mestinya.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Keterangan Kematian")
					{
					$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s5idpenduduk]'"));
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:20px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $d2[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $d2[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $d2[tempatlahir].", ".date("d-m-Y",strtotime($d2[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $d2[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $d2[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $d2[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $d2[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $d2[alamat]?></td>
						</tr>
					</table>
					
					<p>Nama tersebut diatas telah meninggal dunia pada :</p>
					<table width="100%" style="margin:20px 100px">
						<tr>
							<td width="20%">Tanggal</td>
							<td width="2%">:</td>
							<td><?echo date("d-m-Y",strtotime($dCek2[s5tanggal]))?></td>
						</tr>
						<tr>
							<td>Jam</td>
							<td>:</td>
							<td><?echo $dCek2[s5waktu]?></td>
						</tr>
						<tr>
							<td>Meniggal di</td>
							<td>:</td>
							<td><?echo $dCek2[s5tempat]?></td>
						</tr>
						<tr>
							<td>Dikarenakan</td>
							<td>:</td>
							<td><?echo $dCek2[s5sebab]?></td>
						</tr>
					</table>
					
					<p>Sebagai ahli warisnya adalah :</p>
					<table width="100%" style="margin:20px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					
					<p>Demikian surat keterangan ini dibuat semoga dapat dipergunakan sebagaimana mestinya.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Keterangan Usaha")
					{
					$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s5idpenduduk]'"));
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:20px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					
					<p>Nama tersebut diatas adalah warga Desa Pasuruan Kecamata Penengahan Kabupaten Lampung Setalan dan usahanya :</p>
					<div style="text-align:center;font-size:20px;font-weight:bold;"><u><?echo strtoupper($dCek2[s4usaha])?></u></div></br>
					
					
					<p>Yang berlokasi di Desa Pasuruan Kecamatan Penengahan Kabupaten Lampung Selatan.</br>
					Demikian surat keterangan ini dibuat semoga dapat dipergunakan sebagaimana mestinya.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Izin Keramaian")
					{
					$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s5idpenduduk]'"));
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:20px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					
					<p>Mohon agar warga kami tersebut diatad diberikan Surat Izin Keramaian dalam rangka <?echo $dCek2[s3acara]?> yang akan diselenggarakan pada :</p>
					<table width="100%" style="margin:20px 100px">
						<tr>
							<td width="20%">Tanggal</td>
							<td width="2%">:</td>
							<td><?echo date("d-m-Y",strtotime($dCek2[s3tanggal]))?></td>
						</tr>
						<tr>
							<td>Jam</td>
							<td>:</td>
							<td><?echo $dCek2[s3waktu]?></td>
						</tr>
						<tr>
							<td>Acara</td>
							<td>:</td>
							<td><?echo $dCek2[s3acara]?></td>
						</tr>
						<tr>
							<td>Tempat</td>
							<td>:</td>
							<td><?echo $dCek2[s3tempat]?></td>
						</tr>
						<tr>
							<td>Hiburan</td>
							<td>:</td>
							<td><?echo $dCek2[s3hiburan]?></td>
						</tr>
						<tr>
							<td>Peserta/Undangan</td>
							<td>:</td>
							<td><?echo number_format($dCek2[s3jumlahpeserta])?> Orang</td>
						</tr>
					</table>
					
					<p>Demikian surat permohonan izin ini kami buat, atas dikeluarkannya surat izin keramaian tersebut kami mengucapkan terima kasih.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Pengantar Perkawinan")
					{
					$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s5idpenduduk]'"));
					$d3 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s7idpendudukayah]'"));
					$d4 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s7idpendudukibu]'"));
				?>
					<p>Yang bertanda tangan dibawah ini menjelaskan dengan sesungguhnya bahwa :</p>
					<table width="100%" style="margin:20px 50px">
						<tr>
							<td width="3%">1.</td>
							<td width="30%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>2.</td>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>3.</td>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>4.</td>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>5.</td>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>6.</td>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>7.</td>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>8.</td>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
						<tr>
							<td>9.</td>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>a. Laki-laki : Jejaka, Duda,</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;atau beristri ke 1</td>
							<td>:</td>
							<td><?echo $dCek2[s8a]?></td>
						</tr>
						<tr>
							<td></td>
							<td>b. Perempuan : Perawan, Janda</td>
							<td>:</td>
							<td><?echo $dCek2[s8b]?></td>
						</tr>
						<tr>
							<td>10.</td>
							<td>Nama suami/istri terdahulu</td>
							<td>:</td>
							<td><?echo $dCek2[s8namaterdahulu]?></td>
						</tr>
					</table>
					
					<p>Adalah benar anak dari perkawinan seorang pria :</p>
					<table width="100%" style="margin:20px 50px">
						<tr>
							<td width="33%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $d3[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $d3[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $d3[tempatlahir].", ".date("d-m-Y",strtotime($d3[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $d3[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $d3[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $d3[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $d3[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $d3[alamat]?></td>
						</tr>
					</table>
					<p>dengan seorang wanita :</p>
					<table width="100%" style="margin:20px 50px">
						<tr>
							<td width="33%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $d4[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $d4[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $d4[tempatlahir].", ".date("d-m-Y",strtotime($d4[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $d4[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $d4[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $d4[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $d4[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $d4[alamat]?></td>
						</tr>
					</table>
					
					<p>Demikian surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Izin Orang Tua")
					{
					$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s5idpenduduk]'"));
					$d3 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s7idpendudukayah]'"));
					$d4 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$dCek2[s7idpendudukibu]'"));
				?>
					<p>Yang bertanda tangan dibawah in :</p>
					<table width="100%" style="margin:20px 50px">
						<tr>
							<td width="3%">A.</td>
							<td width="3%">1.</td>
							<td width="30%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $d3[nama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>2.</td>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $d3[jeniskelamin]?></td>
						</tr>
						<tr>
							<td></td>
							<td>3.</td>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $d3[tempatlahir].", ".date("d-m-Y",strtotime($d3[tanggallahir]))?></td>
						</tr>
						<tr>
							<td></td>
							<td>4.</td>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $d3[statuskawin]?></td>
						</tr>
						<tr>
							<td></td>
							<td>5.</td>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $d3[agama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>6.</td>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $d3[pekerjaan]?></td>
						</tr>
						<tr>
							<td></td>
							<td>7.</td>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $d3[nik]?></td>
						</tr>
						<tr>
							<td></td>
							<td>8.</td>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $d3[alamat]?></td>
						</tr>
					</table>
					
					<table width="100%" style="margin:20px 50px">
						<tr>
							<td width="3%">B</td>
							<td width="3%">1.</td>
							<td width="30%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $d4[nama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>2.</td>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $d4[jeniskelamin]?></td>
						</tr>
						<tr>
							<td></td>
							<td>3.</td>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $d4[tempatlahir].", ".date("d-m-Y",strtotime($d4[tanggallahir]))?></td>
						</tr>
						<tr>
							<td></td>
							<td>4.</td>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $d4[statuskawin]?></td>
						</tr>
						<tr>
							<td></td>
							<td>5.</td>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $d4[agama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>6.</td>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $d4[pekerjaan]?></td>
						</tr>
						<tr>
							<td></td>
							<td>7.</td>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $d4[nik]?></td>
						</tr>
						<tr>
							<td></td>
							<td>8.</td>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $d4[alamat]?></td>
						</tr>
					</table>
					
					<p>Adalah ayah dan ibu kandung dari :</p>
					<?
					if($dCek1[jeniskelamin]=='Laki=laki'){$bin = "Bin";}
					else{$bin = "Binti";}
					if($dCek2[jeniskelamin]=='Laki=laki'){$bin2 = "Bin";}
					else{$bin2 = "Binti";}
					?>
					<table width="100%" style="margin:20px 50px">
						<tr>
							<td width="3%"></td>
							<td width="3%">1.</td>
							<td width="30%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>2.</td>
							<td><?echo $bin?></td>
							<td>:</td>
							<td><?echo $d3[nama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>3.</td>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td></td>
							<td>4.</td>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td></td>
							<td>5.</td>
							<td>Kewarganegaraan</td>
							<td>:</td>
							<td><?echo $dCek1[kewarganegaraan]?></td>
						</tr>
						<tr>
							<td></td>
							<td>6.</td>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>7.</td>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td></td>
							<td>8.</td>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="3">Memberikan izin kepada anak kami untuk melaksanakan perkawinan dengan :</td>
						</tr>
						<tr>
							<td width="3%"></td>
							<td width="3%">1.</td>
							<td width="30%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek2[s7nama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>2.</td>
							<td><?echo $bin2?></td>
							<td>:</td>
							<td><?echo $dCek2[s7bin]?></td>
						</tr>
						<tr>
							<td></td>
							<td>3.</td>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek2[s7nik]?></td>
						</tr>
						<tr>
							<td></td>
							<td>4.</td>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek2[s7tempatlahir].", ".date("d-m-Y",strtotime($dCek2[s7tanggallahir]))?></td>
						</tr>
						<tr>
							<td></td>
							<td>5.</td>
							<td>Kewarganegaraan</td>
							<td>:</td>
							<td><?echo $dCek2[s7kewarganegaraan]?></td>
						</tr>
						<tr>
							<td></td>
							<td>6.</td>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek2[s7agama]?></td>
						</tr>
						<tr>
							<td></td>
							<td>7.</td>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek2[s7pekerjaan]?></td>
						</tr>
						<tr>
							<td></td>
							<td>8.</td>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek2[s7alamat]?></td>
						</tr>
					</table>
					
					<p>Demikian surat izin ini dibuat dengan kesadaran tanpa ada paksaan dari siapapun dan untuk digunakan seperlunya.</p>
					<div style="float:left;width:30%">
				    	<table width="100%">
							<tr>
				    			<td align="center"></br></td>
				    		</tr>
							<tr>
				    			<td align="center">Ayah</td>
				    		</tr>
				    		<tr><td></br></br></br></br></td></tr>
							<tr>
				    			<td align="center"><?echo $d3[nama]?></td>
				    		</tr>
				    	</table>
				    </div>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Keterangan Belum Menikah")
					{
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:50px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					
					<p>Nama tersebut diatas sepanjang pengamatan kami masih berstatus (Belum Menikah).</p>
					</br>
					<p>Demikian surat keterangan ini dibuat semoga dapat dipergunakan sebagaimana mestinya.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Keterangan Tidak Mampu (Sekolah)")
					{
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:50px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					<p>Keluarga tertanggung :</p>
					<table width="100%" style="margin:50px 100px">
						<tr>
							<td><?echo nl2br($dCek2[s6keluarga])?></td>
						</tr>
					</table>
					<p>Nama tersebut diatas adalah warga kami Desa Pasuruan Kecamatan Penengahan Kabupaten Lampung Selatan dan dinyatakan dari keluarga tidak mampu (Pra Sejahtera) alasan ekonomi.</br> Surat keterangan ini dibuat untuk keperluan Sekolah.</p>
					</br>
					<p>Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>
				<?
					}
					
				if($dCek2[jenissurat]=="Surat Keterangan Tidak Mampu (BPJS)")
					{
				?>
					<p>Yang bertanda tangan dibawah ini Kepala Desa Pasuruan Kecamata Pasuruan Kabupaten Lampung Selatan, menerangkan bahwa :</p>
					<table width="100%" style="margin:50px 100px">
						<tr>
							<td width="20%">Nama</td>
							<td width="2%">:</td>
							<td><?echo $dCek1[nama]?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td><?echo $dCek1[jeniskelamin]?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td><?echo $dCek1[tempatlahir].", ".date("d-m-Y",strtotime($dCek1[tanggallahir]))?></td>
						</tr>
						<tr>
							<td>Status Perkawinan</td>
							<td>:</td>
							<td><?echo $dCek1[statuskawin]?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td>:</td>
							<td><?echo $dCek1[agama]?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td>:</td>
							<td><?echo $dCek1[pekerjaan]?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>:</td>
							<td><?echo $dCek1[nik]?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td><?echo $dCek1[alamat]?></td>
						</tr>
					</table>
					<p>Keluarga tertanggung :</p>
					<table width="100%" style="margin:50px 100px">
						<tr>
							<td><?echo nl2br($dCek2[s6keluarga])?></td>
						</tr>
					</table>
					<p>Nama tersebut diatas adalah warga kami Desa Pasuruan Kecamatan Penengahan Kabupaten Lampung Selatan dan dinyatakan dari keluarga tidak mampu (Pra Sejahtera) alasan ekonomi.</br> Surat keterangan ini dibuat untuk mendapatkan Kartu BPJS / Pelayanan Kesehatan.</p>
					</br>
					<p>Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya.</p>
				<?
					}
				?>
				
    <!-- ################################################################################################################# -->
    <?
	$dB = mysql_fetch_array(mysql_query("SELECT * FROM kepaladesa"));
	?>
	<div style="float:right;width:30%">
    	<table width="100%">
			<tr>
    			<td align="center">Pasuruan , <?echo date("d-m-Y")?></td>
    		</tr>
			<tr>
    			<td align="center">Kepala Desa Pasuruan</td>
    		</tr>
    		<tr><td></br></br></br></br></td></tr>
			<tr>
    			<td align="center"><?echo $dB[namakepaladesa]?></td>
    		</tr>
    	</table>
    </div>
    <div class="clearfix"></div>

</body>