<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>peta bandar lampung </title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

</head><?
if($_REQUEST[submenu]=="A")
	{
	if(!empty($_REQUEST[simpanrating]))
		{
		$q1 = mysql_query("INSERT INTO rating SET								
	                                    waktu=NOW(),			
	                                    idpencari='$_SESSION[idpencari]',
	                                    idpenjahit='$_REQUEST[simpanrating]',
	                                    poin='$_REQUEST[rating1]'
							");
		mysql_query("DELETE FROM hasilpencarian WHERE idpencari='$_SESSION[idpencari]'");
				
		echo '<script>alert ("Proses Berhasil!")</script>';
		}

?>
<div id="map" style="width: 1600px; height: 400px;text-align:center;margin-top:10px "></div>
<script>
	var map = L.map('map').setView([-5.450000, 105.266670], 13);

	var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);
	
	var marker = L.marker([-5.345272, 105.253230]).addTo(map);marker.bindPopup ("<b>Penjahit Deka</b>").openPopup();
	var marker = L.marker([-5.343392, 105.244896]).addTo(map);marker.bindPopup ("<b>Penjahit Ibu Ati</b>").openPopup();
	var marker = L.marker([-5.350987, 105.263167]).addTo(map);marker.bindPopup ("<b>Citra busana</b>").openPopup();
	var marker = L.marker([-5.353849, 105.248673]).addTo(map);marker.bindPopup ("<b>Rumah Jahit Liana</b>").openPopup();
	var marker = L.marker([-5.349203, 105.259691]).addTo(map);marker.bindPopup ("<b>Penjahit Sabrina</b>").openPopup();
	var marker = L.marker([-5.369963, 105.227760]).addTo(map);marker.bindPopup ("<b>Anisa Busana</b>").openPopup();
	var marker = L.marker([-5.340622, 10.524622]).addTo(map);marker.bindPopup ("<b>Penjahit Rahmah 2</b>").openPopup();
	var marker = L.marker([-5.366329, 105.236020]).addTo(map);marker.bindPopup ("<b>Permak levis ujang</b>").openPopup();
	var marker = L.marker([-5.374223,105.242652]).addTo(map);marker.bindPopup ("<b>Permak jodes</b>").openPopup();
	var marker = L.marker([-5.362783,105.246660]).addTo(map); marker.bindPopup ("<b>Harsen Konveksi Lampung</b>").openPopup();
	var marker = L.marker([-5.384473,105.253891]).addTo(map); marker.bindPopup ("<b>Konveksi Quantum</b>").openPopup();
	var marker = L.marker([-5.369990,105.247225]).addTo(map); marker.bindPopup ("<b>Kebaya DBL</b>").openPopup();
	var marker = L.marker([-5.387419,105.257988]).addTo(map); marker.bindPopup ("<b>Katun Konveksi</b>").openPopup();
	var marker = L.marker([-5.373040,105.252768]).addTo(map); marker.bindPopup ("<b>Permak Andre</b>").openPopup();
	var marker = L.marker([-5.362954,105.256115]).addTo(map); marker.bindPopup ("<b>Penjahit Toni</b>").openPopup();
	var marker = L.marker([-5.364076,105.256415]).addTo(map); marker.bindPopup ("<b>Cemerlang Tailor</b>").openPopup();
	var marker = L.marker([-5.372798,105.254189]).addTo(map); marker.bindPopup ("<b>Gun Permak</b>").openPopup();
	var marker = L.marker([-5.398591,105.251822]).addTo(map); marker.bindPopup ("<b>Fajar Taylor</b>").openPopup();
	var marker = L.marker([-5.373059,105.266226]).addTo(map); marker.bindPopup ("<b>Permak Bancar II </b>").openPopup();
	var marker = L.marker([-5.374255,105.216322]).addTo(map); marker.bindPopup ("<b>Anjilika</b>").openPopup();
	var marker = L.marker([-5.387179,105.220619]).addTo(map); marker.bindPopup ("<b>Fazle Maula</b>").openPopup();
	var marker = L.marker([-5.394769,105.216537]).addTo(map); marker.bindPopup ("<b>Graniayaga</b>").openPopup();
	var marker = L.marker([-5.393103,105.215357]).addTo(map); marker.bindPopup ("<b>Permak Kresna</b>").openPopup();
	var marker = L.marker([-5.403037,105.198612]).addTo(map); marker.bindPopup ("<b>Permak Levi's</b>").openPopup();
	var marker = L.marker([-5.391380,105.220090]).addTo(map); marker.bindPopup ("<b>Ida Kebaya</b>").openPopup();
	var marker = L.marker([-5.362422,105.281621]).addTo(map); marker.bindPopup ("<b>Dk Konveksi</b>").openPopup();
	var marker = L.marker([-5.360372,105.272818]).addTo(map); marker.bindPopup ("<b>widie jeans</b>").openPopup();
	var marker = L.marker([-5.363254,105.287956]).addTo(map); marker.bindPopup ("<b>Kuncung collection</b>").openPopup();
	var marker = L.marker([-5.359294,105.283871]).addTo(map); marker.bindPopup ("<b>Ira Tailor</b>").openPopup();
	var marker = L.marker([-5.353174,105.287544]).addTo(map); marker.bindPopup ("<b>Penjahit 2N</b>").openPopup();
	var marker = L.marker([-5.350529,105.291326]).addTo(map); marker.bindPopup ("<b>penjahit Lia</b>").openPopup();
	var marker = L.marker([-5.363476,105.289900]).addTo(map); marker.bindPopup ("<b>Silva Busana</b>").openPopup();
	var marker = L.marker([-5.377518,105.275165]).addTo(map); marker.bindPopup ("<b>Ferdinan tailor</b>").openPopup();
	var marker = L.marker([-5.385046,105.274143]).addTo(map); marker.bindPopup ("<b>Penjahit Septi</b>").openPopup();
	var marker = L.marker([-5.385878,105.273481]).addTo(map); marker.bindPopup ("<b>Sadewo</b>").openPopup();
	var marker = L.marker([-5.384873,105.267618]).addTo(map); marker.bindPopup ("<b>Yasuka tailor</b>").openPopup();
	var marker = L.marker([-5.392568,105.271114]).addTo(map); marker.bindPopup ("<b>Rumah Jahit Opi </b>").openPopup();
	var marker = L.marker([-5.391951,105.281376]).addTo(map); marker.bindPopup ("<b>Bintang Konveksi</b>").openPopup();
	var marker = L.marker([-5.429437,105.267327]).addTo(map); marker.bindPopup ("<b>Delia busana</b>").openPopup();
	var marker = L.marker([-5.433410,105.262435]).addTo(map); marker.bindPopup ("<b>Vermak Dedi</b>").openPopup();
	var marker = L.marker([-5.433231,105.257083]).addTo(map); marker.bindPopup ("<b>Rumah jahit Eli</b>").openPopup();
	var marker = L.marker([-5.434538,105.254410]).addTo(map); marker.bindPopup ("<b>Aceh Busana</b>").openPopup();
	var marker = L.marker([-5.437305,105.253230]).addTo(map); marker.bindPopup ("<b>Dinta Tailor</b>").openPopup();
	var marker = L.marker([-5.431594,105.242420]).addTo(map); marker.bindPopup ("<b>Novi Jahit</b>").openPopup();
	var marker = L.marker([-5.444142,105.260745]).addTo(map); marker.bindPopup ("<b>Fahni Tailor</b>").openPopup();
	var marker = L.marker([-5.446897,105.264628]).addTo(map); marker.bindPopup ("<b>Yen Tailor</b>").openPopup();
	var marker = L.marker([-5.447880,105.261882]).addTo(map); marker.bindPopup ("<b>Penjahit Mustika</b>").openPopup();
	var marker = L.marker([-5.449654,105.309066]).addTo(map); marker.bindPopup ("<b>Junaidi Tailor</b>").openPopup();
	var marker = L.marker([-5.445818,105.266438]).addTo(map); marker.bindPopup ("<b>Kardinal Konveksi</b>").openPopup();
	var marker = L.marker([-5.452442,105.244208]).addTo(map); marker.bindPopup ("<b>Penjahit Novia</b>").openPopup();
	var marker = L.marker([-5.392451,105.222362]).addTo(map); marker.bindPopup ("<b>Virgi Taylor</b>").openPopup();
	var marker = L.marker([-5.397913,105.229135]).addTo(map); marker.bindPopup ("<b>Rumah Jahit mba Lela</b>").openPopup();
	var marker = L.marker([-5.418685,105.249830]).addTo(map); marker.bindPopup ("<b>Diamond Tailor</b>").openPopup();
	var marker = L.marker([-5.418632,105.251794]).addTo(map); marker.bindPopup ("<b>Beauty Tailor</b>").openPopup();
	var marker = L.marker([-5.415646,105.263024]).addTo(map); marker.bindPopup ("<b>Penjahit Rohana</b>").openPopup();
	var marker = L.marker([-5.416922,105.274661]).addTo(map); marker.bindPopup ("<b>Penjahit lili</b>").openPopup();
	var marker = L.marker([-5.396066,105.316420]).addTo(map); marker.bindPopup ("<b>Agung Konveksi</b>").openPopup();
	var marker = L.marker([-5.405103,105.251203]).addTo(map); marker.bindPopup ("<b>Ria Kebaya</b>").openPopup();
	var marker = L.marker([-5.406681,105.240598]).addTo(map); marker.bindPopup ("<b>Yani Jahit</b>").openPopup();
	var marker = L.marker([-5.388806,105.244005]).addTo(map); marker.bindPopup ("<b>Fira Jahit</b>").openPopup();
	var marker = L.marker([-5.403079,105.250166]).addTo(map); marker.bindPopup ("<b>Idaman Konveksi</b>").openPopup();
	var marker = L.marker([-5.415305,105.257456]).addTo(map); marker.bindPopup ("<b>cik ian jahit</b>").openPopup();
	var marker = L.marker([-5.414528,105.258365]).addTo(map); marker.bindPopup ("<b>Amril Jahit</b>").openPopup();
	var marker = L.marker([-5.414547,105.259277]).addTo(map); marker.bindPopup ("<b>Agus Jahit</b>").openPopup();
	var marker = L.marker([-5.421226,105.262031]).addTo(map); marker.bindPopup ("<b>Waya Jahit</b>").openPopup();
	var marker = L.marker([-5.421278,105.262012]).addTo(map); marker.bindPopup ("<b>Penjahit Anugerah </b>").openPopup();
	var marker = L.marker([-5.410956,105.265987]).addTo(map); marker.bindPopup ("<b>Barokah Tailor</b>").openPopup();
	var marker = L.marker([-5.391494,105.300237]).addTo(map); marker.bindPopup ("<b>Permak zen</b>").openPopup();
	var marker = L.marker([-5.388134,105.307028]).addTo(map); marker.bindPopup ("<b>Jahit Ibu mukadasa</b>").openPopup();
	var marker = L.marker([-5.374880,105.289981]).addTo(map); marker.bindPopup ("<b>Jahit Liana</b>").openPopup();
	var marker = L.marker([-5.375813,105.289957]).addTo(map); marker.bindPopup ("<b>Penjahit Swis</b>").openPopup();
	var marker = L.marker([-5.389380,105.294319]).addTo(map); marker.bindPopup ("<b>Dyah Modeste</b>").openPopup();
	var marker = L.marker([-5.394186,105.304104]).addTo(map); marker.bindPopup ("<b>Jahit Kebaya</b>").openPopup();
	var marker = L.marker([-5.403295,105.291687]).addTo(map); marker.bindPopup ("<b>Bintang Kebaya</b>").openPopup();
	var marker = L.marker([-5.399954,105.309082]).addTo(map); marker.bindPopup ("<b>Penjahit Ulfa</b>").openPopup();
	var marker = L.marker([-5.401193,105.313803]).addTo(map); marker.bindPopup ("<b>Luwes</b>").openPopup();
	var marker = L.marker([-5.446074,105.274914]).addTo(map); marker.bindPopup ("<b>LC mas Konveksi</b>").openPopup();
	var marker = L.marker([-5.477972,105.323362]).addTo(map); marker.bindPopup ("<b>Penjahit Adinda</b>").openPopup();
	var marker = L.marker([-5.480922,105.323571]).addTo(map); marker.bindPopup ("<b>Warung Jahit Longci</b>").openPopup();
	var marker = L.marker([-5.434434,105.335383]).addTo(map); marker.bindPopup ("<b>Jahit BiliarysD'ti</b>").openPopup();
</script>


	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">					
					<?
					if(empty($_REQUEST[cari]))
						{
						mysql_query("DELETE FROM hasilpencarian WHERE idpencari='$_SESSION[idpencari]'");
					?>
					
						<div class="clearfix mb-20">
							<div class="pull-left">
								<h5 class="text-warning text-center">Cari Jasa Jahit Di Sekitar Anda!</h5>
							</div>
						</div>
						
						<div class="row" style="margin-top:20px">
						<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
							<div class="card text-white bg-secondary box-shadow">
								<div class="card-header" style="padding-bottom:0px;"><p>Lokasi Anda Saat Ini!<span style="float:right;padding:0 10px;font-size:13px" class="btn btn-outline-warning">Tersimpan</span></p></div>
								
								<form method="post" action="" enctype="multipart/form-data">
								<div class="card-body" style="">
									<div class="project-info-center" style="color:#ffe954;margin-bottom:20px;text-align:center">
										<b>Latitude</b></br><input type="text" name='lat' id='latitude' readonly="" style="background:none;border:none;cursor:default;color:#ffe954;text-align:center"></br>
										<b>Longitude</b></br><input type="text" name='lon' id='longitude' readonly="" style="background:none;border:none;cursor:default;color:#ffe954;text-align:center">
									</div>
								</div>
								<div style="text-align: center;margin:20px">
									<input type="hidden" name="cari" value="1">
									<button type="submit" class="btn btn-warning btn-sm">Klik Untuk Mencari Jasa Jahit Terdekat</button>
								</div>
								</form>
							</div>
						</div>
					<?
						}
					
					if(!empty($_REQUEST[cari]))
						{
					?>
						<div class="page-header">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="title">
										<h5 class="text-warning text-center">Cari Jasa Jahit Di Sekitar Anda!</h5>
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="row" style="margin-top:20px">
					<?
						$qA = mysql_query("SELECT * FROM penjahit");
						while($dA = mysql_fetch_array($qA))
							{
							mysql_query("INSERT INTO hasilpencarian SET lon1='$_REQUEST[lon]',
																		lat1='$_REQUEST[lat]',
																		lon2='$dA[lon]',
																		lat2='$dA[lat]',
																		rad='0.0174532925',
																		R='6371',
																		idpenjahit='$dA[idpenjahit]',
																		idpencari='$_SESSION[idpencari]'
										");
							}
					?>
						<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
							<div class="contact-directory-list">
								<ul class="row">
		                            <?
									$q1 = mysql_query("SELECT * FROM hasilpencarian_step2 WHERE idpencari='$_SESSION[idpencari]' ORDER BY d");
									$q2 = mysql_query("SELECT * FROM hasilpencarian_step2 WHERE idpencari='$_SESSION[idpencari]' ORDER BY d");
		                            while($d1 = mysql_fetch_array($q1))
		                            	{
		                            	$d3 = mysql_fetch_array(mysql_query("SELECT * FROM penjahit WHERE idpenjahit='$d1[idpenjahit]'"));
		                            	$d4 = mysql_fetch_array(mysql_query("SELECT SUM(poin) AS t1, COUNT(idpencari) AS t2 FROM rating WHERE idpenjahit='$d1[idpenjahit]'"));
		                            	$rating = round($d4[t1]/$d4[t2],0);
		                            	$dCek1 = mysql_fetch_array(mysql_query("SELECT idpencari FROM rating WHERE idpenjahit='$d1[idpenjahit]' AND idpencari='$_SESSION[idpencari]'"));
		                            ?>
										<li class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
											<div class="contact-directory-box">
												<div class="contact-dire-info text-center">
													<div class="contact-avatar">
														<span>
															<img src="foto/<?echo $d3[foto]?>" alt="">
														</span>
													</div>
													<div class="contact-name">
														<h4><?echo $d3[nama]?></h4>
														<a href="https://www.google.com/maps?q=loc:<?echo $d3[lat]?>,<?echo $d3[lon]?>" target="_blank" class="dropdown-item">
															<div class="work text-success" style="font-size:18px"><i class="icon-copy fa fa-location-arrow" aria-hidden="true"></i> <?echo round($d1[d],4)?> Km</div>
															<i>Jarak Garis Lurus</i>
															<i>Klik Untuk ke Peta</i>
															
														</a>
														<?echo $d3[alamat]?>
													</div>
													<div class="contact-skill">
													<?
													$qJ = mysql_query("SELECT * FROM jenispenjahit WHERE idpenjahit='$d1[idpenjahit]'");
													while($dJ = mysql_fetch_array($qJ))
														{
													?>
														<span class="badge badge-pill"><?echo $dJ[jenis]?></span>
													<?
														}
													?>
													</div>
													
														<?if($rating>=5){?>
															<i class="icon-copy fa fa-star text-warning" aria-hidden="true" style="font-size:24px;font-weight:bold"></i>
														<?}?>
														<?if($rating>=4){?>
															<i class="icon-copy fa fa-star text-warning" aria-hidden="true" style="font-size:24px;font-weight:bold"></i>
														<?}?>
														<?if($rating>=3){?>
															<i class="icon-copy fa fa-star text-warning" aria-hidden="true" style="font-size:24px;font-weight:bold"></i>
														<?}?>
														<?if($rating>=2){?>
															<i class="icon-copy fa fa-star text-warning" aria-hidden="true" style="font-size:24px;font-weight:bold"></i>
														<?}?>
														<?if($rating>=1){?>
															<i class="icon-copy fa fa-star text-warning" aria-hidden="true" style="font-size:24px;font-weight:bold"></i>
														<?}?>
				                                    
														<?
														if(empty($dCek1[idpencari]))
															{
														?>
															<div class="profile-sort-desc">
																<a data-toggle="modal" data-target="#bd-example-modal-rt<?echo $d1[idpenjahit]?>" class="dropdown-item" style="cursor: pointer"><i class="fa fa-star"></i> Berikan Rating Anda</a>
															</div>
														<?
															}
														?>
												</div>
												<div class="view-contact">
													<a data-toggle="modal" data-target="#bd-example-modal-lg<?echo $d1[idpenjahit]?>" style="cursor: pointer" class="dropdown-item"><i class="fa fa-search"></i> Lihat Karya</a>
												</div>
											</div>
										</li>
		                            <?
		                            	}
		                            ?>
								</ul>
							</div>
							
							<a href="?opt=<?echo $_REQUEST[opt]?>&menu=<?echo $_REQUEST[menu]?>&submenu=A">
								<button type="button" class="btn btn-danger col-md-12"><i class="icon-copy fa fa-arrow-left" aria-hidden="true"></i> Cari Ulang</button>
							</a>
						</div>
					<?
						}
					?>
					</div>
						
			    <?
                    while($d2 = mysql_fetch_array($q2))
                    	{
	                    $d4 = mysql_fetch_array(mysql_query("SELECT * FROM penjahit WHERE idpenjahit='$d2[idpenjahit]'"))
                ?>
						<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg<?echo $d2[idpenjahit]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myLargeModalLabel">Lihat Karya <?echo $d4[nama]?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<div class="modal-body">
										<div class="product-wrap">
											<div class="product-list">
											<ul class="row">
					                            <?
												$qX = mysql_query("SELECT * FROM karya WHERE idpenjahit='$d2[idpenjahit]'");
					                            while($dX = mysql_fetch_array($qX))
					                            	{
					                            ?>
													<li class="col-lg-4 col-md-6 col-sm-12">
														<div class="product-box">
															<div class="producct-img"><img src="karya/<?echo $dX[foto]?>" alt=""></div>
															<div class="product-caption">
																<h4><a href="#"><?echo $dX[nama]?></a></h4>
																<div class="price">
																	<?echo $dX[deskripsi]?>
																</div>
															</div>
														</div>
													</li>
					                            <?
					                            	}
					                            ?>
					                        </ul>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
									</div>
								</div>
							</div>
						</div>
						
						<div class="modal fade bs-example-modal-lg" id="bd-example-modal-rt<?echo $d2[idpenjahit]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myLargeModalLabel">Berikan Ratting - <?echo $d4[nama]?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<form method="post" name="form1" action="" enctype="multipart/form-data"> 
									<div class="modal-body">
										<div class="row  text-center" style="margin-top:20px;">
											  <div class="rating-css">
											    <div class="star-icon">
											      <input type="radio" name="rating1" value="1" id="rating1<?echo $d2[idpenjahit]?>" checked="">
											      <label for="rating1<?echo $d2[idpenjahit]?>" class="fa fa-star"></label>
											      
											      <input type="radio" name="rating1" value="2" id="rating2<?echo $d2[idpenjahit]?>">
											      <label for="rating2<?echo $d2[idpenjahit]?>" class="fa fa-star"></label>
											      
											      <input type="radio" name="rating1" value="3" id="rating3<?echo $d2[idpenjahit]?>">
											      <label for="rating3<?echo $d2[idpenjahit]?>" class="fa fa-star"></label>
											      
											      <input type="radio" name="rating1" value="4" id="rating4<?echo $d2[idpenjahit]?>">
											      <label for="rating4<?echo $d2[idpenjahit]?>" class="fa fa-star"></label>
											      
											      <input type="radio" name="rating1" value="5" id="rating5<?echo $d2[idpenjahit]?>">
											      <label for="rating5<?echo $d2[idpenjahit]?>" class="fa fa-star"></label>
											    </div>
											  </div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<input type="hidden" name="simpanrating" value="<?echo $d2[idpenjahit]?>">
										<button type="submit" class="btn btn-success">Simpan</button>
									</div>
									</form>
								</div>
							</div>
						</div>
					<?
						}
					?>
					
				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
<?
	}
?>