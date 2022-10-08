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
	<?
	if(empty($_SESSION[jenissurat])){
		$js = "SEMUA JENIS SURAT";
		}
	else{
		$js = strtoupper($_SESSION[jenissurat]);
		}
	?>
	<div class="clearfix"></div>
	<div style="border-bottom:2px #000 solid;margin-bottom: 2px"></div>
	<div style="border-bottom:1px #000 solid"></div>
	<div class="col-xs-12" style="text-align: center;margin:20px">
		<h5><b><u>LAPORAN <?echo $js?></u></b></h5>	
		<p style="margin-top:0px">Periode : <?echo date("d-m-Y",strtotime($_SESSION[periode_awal]))?> s.d <?echo date("d-m-Y",strtotime($_SESSION[periode_akhir]))?></p>
	</div>
	
						
						<table border="1">
							<thead>
								<tr>
									<th width="1%" style="padding: 5px">No.</th>
									<th style="padding: 5px">Tanggal</th>
									<th style="padding: 5px">NIK</th>
									<th style="padding: 5px">Nama</th>
									<th style="padding: 5px">Jenis Surat</th>
									<th style="padding: 5px">Keperluan</th>
									<th style="padding: 5px">Tgl Respon</th>
									<th style="padding: 5px">No. Surat</th>
								</tr>
							</thead>
							<tbody style="font-size:14px">
	                            <?
	                            $no = 1;
	                            if(empty($_SESSION[jenissurat])){
									$q1 = mysql_query("SELECT * FROM pengajuansurat WHERE status>0 AND tanggalpengajuan BETWEEN '$_SESSION[periode_awal]' AND '$_SESSION[periode_akhir]' ORDER BY idpengajuansurat DESC");
									}
	                            else{
									$q1 = mysql_query("SELECT * FROM pengajuansurat WHERE status>0 AND tanggalpengajuan BETWEEN '$_SESSION[periode_awal]' AND '$_SESSION[periode_akhir]' AND jenissurat='$_SESSION[jenissurat]' ORDER BY idpengajuansurat DESC");
									}
									
	                            while($d1 = mysql_fetch_array($q1))
	                            	{
	                            	$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penduduk WHERE idpenduduk='$d1[idpenduduk]'"));
	                            	if($d1[status]==0){
										$sts = "<button type='button' class='btn btn-secondary btn-block btn-sm' disabled>Menunggu Respon Admin Kelurahan</button>";
										}
	                            ?>
	                                <tr>
	                                    <td align="right" style="padding: 5px"><?echo $no?>.</td>
	                                    <td style="padding: 5px"><?echo date("d-m-Y",strtotime($d1[tanggalpengajuan]))?></td>
	                                    <td style="padding: 5px"><?echo $d2[nik]?></td>
	                                    <td style="padding: 5px"><?echo $d2[nama]?></td>
	                                    <td style="padding: 5px"><?echo $d1[jenissurat]?></td>
	                                    <td style="padding: 5px"><?echo $d1[keperluan]?></td>
	                                    <td style="padding: 5px"><?echo date("d-m-Y",strtotime($d1[tanggalrespon]))?></td>
	                                    <td style="padding: 5px"><?echo $d1[nomorsurat]?></td>
	                                </tr>
	                            <?
	                            	$no++;
	                            	}
	                            ?>
							</tbody>
						</table>
    <!-- ################################################################################################################# -->
    <?
	$dB = mysql_fetch_array(mysql_query("SELECT * FROM kepaladesa"));
	?>
	<div style="float:right;width:30%">
    	<table width="100%">
			<tr>
    			<td align="center"></br>Pasuruan , <?echo date("d-m-Y")?></td>
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