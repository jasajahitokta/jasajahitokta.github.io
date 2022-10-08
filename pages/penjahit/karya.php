<?
if($_REQUEST[submenu]=="A")
	{
	function Upload1($fupload_name){
	  $vdir_upload = "karya/";
	  $vfile_upload = $vdir_upload . $fupload_name;
	  move_uploaded_file($_FILES["fupload1"]["tmp_name"], $vfile_upload);
	}
	if($_REQUEST[input]==1)
		{
		$lokasi_file    = $_FILES['fupload1']['tmp_name'];
		$tipe_file      = $_FILES['fupload1']['type'];
		$nama_file      = $_FILES['fupload1']['name'];
		$nama_file_unik1 = $nama_file; 
		
		if($tipe_file == "image/jpg" or $tipe_file == "image/jpeg")
			{
			Upload1($nama_file_unik1);
			$q1 = mysql_query("INSERT INTO karya SET						
		                                    nama='$_REQUEST[nama]',
		                                    deskripsi='$_REQUEST[deskripsi]',
		                                    foto='$nama_file_unik1',
		                                	idpenjahit='$_SESSION[idpenjahit]'
								");
			}
		else{
			echo '<script>alert ("Pastikan format yang diupload adalah *.jpg!")</script>';
			print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu'/>";
			exit();
			}
							
				
		echo '<script>alert ("Proses Berhasil!")</script>';
		}
	if(!empty($_REQUEST[ubah]))
		{
		$q1 = mysql_query("UPDATE karya SET								
	                                    nama='$_REQUEST[nama]',
	                                    deskripsi='$_REQUEST[deskripsi]',
	                                WHERE 
			                            idkarya='$_REQUEST[ubah]'
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
				$q1 = mysql_query("UPDATE karya SET						
			                                    foto='$nama_file_unik1'
			                                WHERE 
			                            idkarya='$_REQUEST[ubah]'
									");
				}
			else{
				echo '<script>alert ("Pastikan format yang diupload adalah *.jpg!")</script>';
				print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu'/>";
				exit();
				}
			}
				
		echo '<script>alert ("Proses Berhasil!")</script>';
		print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu&submenu=$submenu'/>";
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
		print "<meta http-equiv='refresh' content='0;url=?opt=$opt&menu=$menu&submenu=$submenu'/>";
		exit();
		}
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h5 class="text-warning">KARYA</h5>
						</div>
					</div>
					<a href="#" class="btn-block" data-toggle="modal" data-target="#bd-example-modal-lg">
						<button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Karya Baru</button>
					</a>
					
					<div class="row" style="margin-top:20px">
						<div class="col-lg-12 col-md-12 col-sm-12 mb-10">
							<table class="data-table2 stripe hover nowrap">
								<thead>
									<tr>
										<th class="table-plus">Nama Karya</th>
										<th>Deskripsi</th>
										<th>Foto</th>
										<th class="datatable-nosort" width="1%">Aksi</th>
									</tr>
								</thead>
								<tbody>
		                            <?
									$q1 = mysql_query("SELECT * FROM karya WHERE idpenjahit='$_SESSION[idpenjahit]' ORDER BY idkarya DESC");
									$q2 = mysql_query("SELECT * FROM karya WHERE idpenjahit='$_SESSION[idpenjahit]' ORDER BY idkarya DESC");
		                            while($d1 = mysql_fetch_array($q1))
		                            	{
		                            ?>
		                                <tr>
		                                    <td><?echo $d1[nama]?></td>
		                                    <td><?echo $d1[deskripsi]?></td>
		                                    <td><img src="karya/<?echo $d1[foto]?>" width="300px"></td> 
											<td>
												<div class="dropdown">
													<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
														<i class="fa fa-ellipsis-h"></i>
													</a>
													<div class="dropdown-menu dropdown-menu-right">
														<a href="#" data-toggle="modal" data-target="#bd-example-modal-lg<?echo $d1[idkarya]?>" class="dropdown-item"><i class="fa fa-pencil"></i> Edit</a>
														<a href="<?echo "?opt=$opt&menu=$menu&submenu=$submenu&delete=$d1[idkarya]"?>" class="dropdown-item" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i> Hapus</a>
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
					</div>
					
					<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-dialog-centered">
							<div class="modal-content">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="modal-header">
										<h4 class="modal-title" id="myLargeModalLabel">Ubah Data</h4>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									</div>
									<div class="modal-body">
										<div class="form-group row">
											<label class="col-sm-12 col-md-4 col-form-label">Nama Karya</label>
											<div class="col-sm-12 col-md-8">
												<input class="form-control" type="text" name='nama' value="<?echo $d2[nama]?>" required="">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-12 col-md-4 col-form-label">Deskripsi</label>
											<div class="col-sm-12 col-md-8">
												<textarea class="form-control" type="text" name="deskripsi" required=""><?echo $d2[deskripsi]?></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-12 col-md-4 col-form-label">Photo Karya</label>
											<div class="col-sm-12 col-md-8">
												<input type="file" name="fupload1" accept="image/*" required>
												<input type="hidden" name="input" value="1">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<button type="submit" class="btn btn-primary">Lanjutkan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
						
			    <?
                    while($d2 = mysql_fetch_array($q2))
                    	{
                ?>
						<div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg<?echo $d2[idkarya]?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg modal-dialog-centered">
								<div class="modal-content">
									<form method="post" action="" enctype="multipart/form-data">
										<div class="modal-header">
											<h4 class="modal-title" id="myLargeModalLabel">Ubah Karya Anda</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">
											<div class="form-group row">
												<label class="col-sm-12 col-md-4 col-form-label">Nama Karya</label>
												<div class="col-sm-12 col-md-8">
													<input class="form-control" type="text" name='nama' value="<?echo $d2[nama]?>" required="">
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-4 col-form-label">Deskripsi</label>
												<div class="col-sm-12 col-md-8">
													<textarea class="form-control" type="text" name="deskripsi" required=""><?echo $d2[deskripsi]?></textarea>
												</div>
											</div>
											<div class="form-group row">
												<label class="col-sm-12 col-md-4 col-form-label">Photo Karya</label>
												<div class="col-sm-12 col-md-8">
													<input type="file" name="fupload1" accept="image/*">
													<input type="hidden" name="ubah" value="<?echo $d2[idkarya]?>">
													<p style="font-size:10px">Kosongkan jika photo profile tidak diubah.</br>Pilih File dengan Extension *.jpg.</p>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<button type="submit" class="btn btn-primary">Lanjutkan</button>
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