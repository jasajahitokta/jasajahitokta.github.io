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
										<th class="table-plus">Waktu</th>
										<th>Nama</th>
										<th>Rating</th>
									</tr>
								</thead>
								<tbody>
		                            <?
									$q1 = mysql_query("SELECT * FROM rating WHERE idpenjahit='$_SESSION[idpenjahit]'");
		                            while($d1 = mysql_fetch_array($q1))
		                            	{
			                            $d3 = mysql_fetch_array(mysql_query("SELECT * FROM pencari WHERE idpencari='$d1[idpencari]'"));
		                            	$rating = $d1[poin];
		                            ?>
		                                <tr>
		                                    <td><?echo date("d-m-Y",strtotime($d1[waktu]))?></br><?echo date("H:i:s",strtotime($d1[waktu]))?></td>
		                                    <td><?echo $d3[nama]?></td>
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