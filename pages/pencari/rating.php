<?
if($_REQUEST[submenu]=="A")
	{
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-warning">Riwayat Rating Anda</h5>
						</div>
					</div>
					
					<div class="row" style="margin-top:20px">
						<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
							<table class="data-table2 stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus">Penjahit</th>
										<th>Alamat</th>
										<th>Jenis</th>
										<th>Rating</th>
										<th>Whatsapp</th>
										<th>Foto</th>
										<th>Lokasi</th>
									</tr>
								</thead>
								<tbody>
		                            <?
									$q1 = mysql_query("SELECT * FROM rating WHERE idpencari='$_SESSION[idpencari]'");
		                            while($d1 = mysql_fetch_array($q1))
		                            	{
			                            $d3 = mysql_fetch_array(mysql_query("SELECT * FROM penjahit WHERE idpenjahit='$d1[idpenjahit]'"));
		                            	$d4 = mysql_fetch_array(mysql_query("SELECT SUM(poin) AS t1, COUNT(idpencari) AS t2 FROM rating WHERE idpenjahit='$d1[idpenjahit]'"));
		                            	$rating = round($d4[t1]/$d4[t2],0);
		                            ?>
		                                <tr>
		                                    <td><?echo $d3[nama]?></td>
		                                    <td><?echo $d3[alamat]?></td>
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
		                                    <td><a href="https://wa.me/628<?echo substr($d3[wa],2,14)?>?text=" target="_blank"><i class="fa fa-whatsapp" style="color:green"></i> <?echo $d3[wa]?></br><i>Klik untuk langsung terhubung via Whatsapp</i></a></td>
			                                   <td><img src="foto/<?echo $d3[foto]?>" width="300px"></td> 
											<td><a href="https://www.google.com/maps?q=loc:<?echo $d3[lat]?>,<?echo $d3[lon]?>" target="_blank" class="dropdown-item"><i class="fa fa-location-arrow"></i> Lihat Lokasi di Maps</a></td>
		                                </tr>
		                            <?
		                            	}
		                            ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include('include/footer.php'); ?>
		</div>
	</div>
<?
	}
?>