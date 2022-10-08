<?
function Upload1($fupload_name){
  $vdir_upload = "foto/";
  $vfile_upload = $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload1"]["tmp_name"], $vfile_upload);
}
if($_REQUEST[ubah]==1)
	{
	$q1 = mysql_query("UPDATE pencari SET						
                                    nama='$_REQUEST[nama]',
                                    email='$_REQUEST[email]',
                                    wa='$_REQUEST[wa]',
                                    alamat='$_REQUEST[alamat]'
                                WHERE 
                                	idpencari='$_SESSION[idpencari]'
						");
						
	$lokasi_file    = $_FILES['fupload1']['tmp_name'];
	$tipe_file      = $_FILES['fupload1']['type'];
	$nama_file      = $_FILES['fupload1']['name'];
	$nama_file_unik1 = $nama_file; 
	
	if(!empty($lokasi_file))
		{
		if($tipe_file == "image/jpg" or $tipe_file == "image/jpeg")
			{
			Upload1($nama_file_unik1);
			$q1 = mysql_query("UPDATE pencari SET						
		                                    foto='$nama_file_unik1'
		                                WHERE 
		                                	idpencari='$_SESSION[idpencari]'
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
if($_REQUEST[up]==1)
	{
	$pass = md5($_REQUEST[pass2]);
	$q1 = mysql_query("UPDATE pencari SET						
                                    pass='$pass'
                                WHERE 
		                            idpencari='$_SESSION[idpencari]'
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>