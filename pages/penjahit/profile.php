<?
function Upload1($fupload_name){
  $vdir_upload = "foto/";
  $vfile_upload = $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload1"]["tmp_name"], $vfile_upload);
}
if($_REQUEST[ubah]==1)
	{
	$q1 = mysql_query("UPDATE penjahit SET						
                                    email='$_REQUEST[email]',
                                    nama='$_REQUEST[nama]',
                                    wa='$_REQUEST[wa]',
                                    lat='$_REQUEST[lat]',
                                    lon='$_REQUEST[lon]',
                                    alamat='$_REQUEST[alamat]'
                                WHERE 
                                	idpenjahit='$_SESSION[idpenjahit]'
						");
						
	$q1 = mysql_query("DELETE FROM jenispenjahit WHERE idpenjahit='$_SESSION[idpenjahit]'");
	
	$qJ = mysql_query("SELECT * FROM jenis");
	while($dJ = mysql_fetch_array($qJ))
		{		
		$id = $dJ[idjenis];
		$jenis = $_REQUEST[jenis.$id];	
		if(!empty($jenis))
			{
			$q1 = mysql_query("INSERT INTO jenispenjahit SET						
		                                    jenis='$jenis',
		                                    idpenjahit='$_SESSION[idpenjahit]'
								");
			}
		}
						
						
	$lokasi_file    = $_FILES['fupload1']['tmp_name'];
	$tipe_file      = $_FILES['fupload1']['type'];
	$nama_file      = $_FILES['fupload1']['name'];
	$nama_file_unik1 = $nama_file; 
	
	if(!empty($lokasi_file))
		{
		if($tipe_file == "image/jpg" or $tipe_file == "image/jpeg")
			{
			Upload1($nama_file_unik1);
			$q1 = mysql_query("UPDATE penjahit SET						
		                                    foto='$nama_file_unik1'
		                                WHERE 
		                                	idpenjahit='$_SESSION[idpenjahit]'
								");
			}
		else{
			echo '<script>alert ("Pastikan format yang diupload adalah *.jpg!")</script>';
			print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu'/>";
			exit();
			}
		}
			
	echo '<script>alert ("Proses Berhasil!")</script>';
	print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu'/>";
	exit();
	}
if($_REQUEST[ubahlokasi]==1)
	{
	$pass = md5();
	$q1 = mysql_query("UPDATE penjahit SET						
                                    lon='$_REQUEST[lon]',
                                    lat='$_REQUEST[lat]'
                                WHERE 
		                            idpenjahit='$_SESSION[idpenjahit]'
								");
			
	echo '<script>alert ("Proses Berhasil!")</script>';
	print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu'/>";
	exit();
	}
if($_REQUEST[up]==1)
	{
	$pass = md5($_REQUEST[pass2]);
	$q1 = mysql_query("UPDATE penjahit SET						
                                    pass='$pass'
                                WHERE 
		                            idpenjahit='$_SESSION[idpenjahit]'
								");
			
	echo '<script>alert ("Proses Berhasil!")</script>';
	print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu'/>";
	exit();
	}
	
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 bg-white border-radius-4 box-shadow">
							<div class="profile-photo">
								<img src="foto/<?echo $dP[foto]?>" alt="" class="avatar-photo">
							</div>
							<h5 class="text-center"><?echo $_SESSION[nama]?></h5>
							<p class="text-center text-muted"><?echo strtoupper($_SESSION[status])?></p>
							
							<?
							if(empty($dP[lon]))
								{
							?>
								<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
									<div class="text-white bg-danger">
										<div class="card-header"><center>Anda belum menyimpan lokasi anda.</center></div>
									</div>
								</div>
							<?
								}
							else
								{
							?>
								<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
									<div class="card text-white bg-success box-shadow">
										<a style='color:#fff' href='https://www.google.com/maps?q=loc:<?echo $dP[lat]?>,<?echo $dP[lon]?>' target='_blank'>
										<div class="card-header" style="padding-bottom:0px;text-align: center"><p>Lokasi Anda</p></div>
										<div class="card-body">
											<div class="project-info-center" style="padding-bottom:0px;text-align: center">
												<p>
													Latitude</br><b><?echo $dP[lat]?></b>
												    <br><br>
												    Longitude</br><b><?echo $dP[lon]?></b>
											    </p>
											</div>
										</div>
										</a>
									</div>
								</div>
							<?
								}
							?>
						</div>
					</div>
					<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="bg-white border-radius-4 box-shadow height-100-p">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#tasks" role="tab">Password</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#lokasi" role="tab">Lokasi</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<form method="post" action="" enctype="multipart/form-data"> 
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-12">
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Nama</label>
																<div class="col-sm-12 col-md-8">
																	<input class="form-control" onkeypress="return buat_angka(event,'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ,.')" type="text" name='nama' value="<?echo $dP[nama]?>" required="">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Email</label>
																<div class="col-sm-12 col-md-8">
																	<input class="form-control" type="email" name='email' value="<?echo $dP[email]?>" required="">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">No. WA</label>
																<div class="col-sm-12 col-md-8">
																	<input class="form-control" onkeypress="return buat_angka(event,'1234567890')" type="text" name='wa' value="<?echo $dP[wa]?>" required="">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Jenis</label>
																<div class="col-sm-12 col-md-8">
																<?
																$qJ = mysql_query("SELECT * FROM jenis");
																while($dJ = mysql_fetch_array($qJ))
																	{
																	$dCk = mysql_fetch_array(mysql_query("SELECT * FROM jenispenjahit WHERE idpenjahit='$_SESSION[idpenjahit]' AND jenis='$dJ[jenis]'"));
																?>
																	<div class="custom-control custom-checkbox mb-5">
																		<input type="checkbox" name="jenis<?echo $dJ[idjenis]?>" value="<?echo $dJ[jenis]?>" class="custom-control-input" id="<?echo $dJ[jenis]?>" <?if($dCk[jenis]==$dJ[jenis]){?>checked=""<?}?>>
																		<label class="custom-control-label" for="<?echo $dJ[jenis]?>"><?echo $dJ[jenis]?></label>
																	</div>
																<?
																	}
																?>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Alamat</label>
																<div class="col-sm-12 col-md-8">
																	<textarea class="form-control" type="text" name="alamat" required=""><?echo $dP[alamat]?></textarea>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Photo Profile</label>
																<div class="col-sm-12 col-md-8">
																	<input type="file" name="fupload1" accept="image/*">
																	<p style="font-size:10px">Kosongkan jika photo profile tidak diubah.</br>Pilih File dengan Extension *.jpg.</p>
																</div>
															</div>
															<div class="form-group row">
																<div class="col-sm-12 col-md-12">
																	<hr>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Latitude</label>
																<div class="col-sm-12 col-md-8">
																	<input class="form-control" onkeypress="return buat_angka(event,'-.1234567890')" type="text" name='lat' value="<?echo $dP[lat]?>" required="">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-sm-12 col-md-4 col-form-label">Longitude</label>
																<div class="col-sm-12 col-md-8">
																	<input class="form-control" onkeypress="return buat_angka(event,'-.1234567890')" type="text" name='lon' value="<?echo $dP[lon]?>" required="">
																</div>
															</div>
															<div class="modal-footer">
																<input type="hidden" name="ubah" value="1">
																<button type="submit" class="btn btn-primary">Simpan</button>
															</div>
														</li>
													</ul>
												</form>
											</div>
										</div>
										
										<div class="tab-pane fade" id="tasks" role="tabpanel">
											<div class="pd-20">
												<script>
												function vgp()
												{
													if (document.gp.pass2.value != document.gp.pass1.value)
														{
															alert ("Password Baru tidak sama!");	 	
															return false;
														}
												}
												</script>
				                           		<form method="post" name="gp" action="" enctype="multipart/form-data" onsubmit="return vgp();">
													<ul>
														<li>
															<div class="form-group row">
																<label class="col-sm-12 col-md-3 col-form-label">Password</label>
																<div class="col-sm-12 col-md-9">
																	<input class="form-control" type="pass" name='pass1' required="">
																</div>
															</div>
														</li>
														<li>
															<div class="form-group row">
																<label class="col-sm-12 col-md-3 col-form-label">Ulangi Password</label>
																<div class="col-sm-12 col-md-9">
																	<input class="form-control" type="pass" name='pass2' required="">
																</div>
															</div>
														</li>
														<div class="modal-footer">
															<input type="hidden" name="up" value="1">
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</ul>
												</form>
											</div>
										</div>
										
										<div class="tab-pane fade" id="lokasi" role="tabpanel">
											<div class="pd-20">
												<div class="product-wrap">
													<div class="product-list">
													<p>Agar dapat ditemukan pada pencarian, Anda wajib mengisi lokasi anda!</p>
														<ul class="row">
															<li class="col-lg-12 col-md-12 col-sm-12">
																<?
																if(empty($dP[lon]))
																	{
																?>
																	<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
																		<div class="text-white bg-danger">
																			<div class="card-header"><center>Anda belum menyimpan lokasi anda.</center></div>
																		</div>
																	</div>
																<?
																	}
																else
																	{
																?>
																	<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
																		<div class="card text-white bg-success box-shadow">
																			<a style='color:#fff' href='https://www.google.com/maps?q=loc:<?echo $dP[lat]?>,<?echo $dP[lon]?>' target='_blank'>
																			<div class="card-header" style="padding-bottom:0px;text-align: center"><p>Lokasi Anda</p></div>
																			<div class="card-body">
																				<div class="project-info-center" style="padding-bottom:0px;text-align: center">
																					<p>
																						Latitude</br><b><?echo $dP[lat]?></b>
																					    <br><br>
																					    Longitude</br><b><?echo $dP[lon]?></b>
																				    </p>
																				</div>
																			</div>
																			</a>
																		</div>
																	</div>
																<?
																	}
																?>
																	<form method="post" action="" enctype="multipart/form-data">
																		<div class="product-caption">
																			<div class="modal-footer">
																				<input type="hidden" name="ubahlokasi" value="1">
																				<input type="hidden" name='lat' id='latitude'>
																				<input type="hidden" name='lon' id='longitude'>
																				<button type="submit" class="btn btn-warning btn-lg col-lg-12">Gunakan Lokasi Anda Saat Ini!</button>
																			</div>
																		</div>
																	</form>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>