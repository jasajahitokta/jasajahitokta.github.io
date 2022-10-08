<?
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
				
		echo '<script>alert ("Proses Berhasil!")</script>';
		}
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-warning">Data Jasa Jahit Bandar Lampung</h5>
						</div>
					</div>
					
					<div class="row" style="margin-top:20px">
						<table class="data-table2 stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus">Nama</th>
									<th>Alamat</th>
									<th>Jenis</th>
									<th>Rating</th>
									<th>Whatsapp</th>
									<th>Foto</th>
									<th class="datatable-nosort" width="1%">Aksi</th>
								</tr>
							</thead>
							<tbody>
	                            <?
								$q1 = mysql_query("SELECT * FROM penjahit ORDER BY nama");
								$q2 = mysql_query("SELECT * FROM penjahit ORDER BY nama");
	                            while($d1 = mysql_fetch_array($q1))
	                            	{
	                            	$d4 = mysql_fetch_array(mysql_query("SELECT SUM(poin) AS t1, COUNT(idpencari) AS t2 FROM rating WHERE idpenjahit='$d1[idpenjahit]'"));
	                            	$rating = round($d4[t1]/$d4[t2],0);
	                            	$dCek1 = mysql_fetch_array(mysql_query("SELECT idpencari FROM rating WHERE idpenjahit='$d1[idpenjahit]' AND idpencari='$_SESSION[idpencari]'"));
	                            ?>
	                                <tr>
	                                    <td><?echo $d1[nama]?></td>
	                                    <td><?echo $d1[alamat]?></td>
	                                    <td>
											<?
											$qJ = mysql_query("SELECT * FROM jenis");
											while($dJ = mysql_fetch_array($qJ))
												{
												$dCk = mysql_fetch_array(mysql_query("SELECT * FROM jenispenjahit WHERE idpenjahit='$d1[idpenjahit]' AND jenis='$dJ[jenis]'"));
												if($dCk[jenis]==$dJ[jenis])
													{
											?>
												<div class="custom-control custom-checkbox mb-5">
													<input type="checkbox" name="jenis<?echo $dJ[idjenis]?>" value="<?echo $dJ[jenis]?>" class="custom-control-input" id="<?echo $dJ[jenis]?>" checked disabled="">
													<label class="custom-control-label" for="<?echo $dJ[jenis]?>"><?echo $dJ[jenis]?></label>
												</div>
											<?
													}
												}
											?>
	                                    </td>
	                                    <td align="center">
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
											<?if($rating<1){?>
												<i>Belum Ada Rating</i>
											<?}?>
	                                    </td>
	                                    <td><a href="https://wa.me/628<?echo substr($d1[wa],2,14)?>?text=" target="_blank"><i class="fa fa-whatsapp" style="color:green"></i> <?echo $d1[wa]?></br><i>Klik untuk langsung terhubung via Whatsapp</i></a></td>
		                                   <td><img src="foto/<?echo $d1[foto]?>" width="300px"></td> 
										<td>
											<div class="dropdown">
												<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="fa fa-ellipsis-h"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<a href="#" data-toggle="modal" data-target="#bd-example-modal-lg<?echo $d1[idpenjahit]?>" class="dropdown-item"><i class="fa fa-search"></i> Lihat Karya</a>
													<a href="https://www.google.com/maps?q=loc:<?echo $d1[lat]?>,<?echo $d1[lon]?>" target="_blank" class="dropdown-item"><i class="fa fa-location-arrow"></i> Lihat Lokasi</a>
													<?
													if(empty($dCek1[idpencari]))
														{
													?>
														<a data-toggle="modal" data-target="#bd-example-modal-rt<?echo $d1[idpenjahit]?>" class="dropdown-item"><i class="fa fa-star"></i> Berikan Rating</a>
													<?
														}
													?>
												</div>
											</div>
										</td>
	                                </tr>
	                            <?
	                            	}
	                            ?>
							</tbody>
						</table>
					</div>
						
			    <?
                    while($d2 = mysql_fetch_array($q2))
                    	{
                ?>
						<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg<?echo $d2[idpenjahit]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myLargeModalLabel">Lihat Karya <?echo $d2[nama]?></h4>
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
										<h4 class="modal-title" id="myLargeModalLabel">Berikan Ratting - <?echo $d2[nama]?></h4>
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
										<input type="hidden" name="cari" value="<?echo $_REQUEST[cari]?>">
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