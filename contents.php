<?
if(empty($opt))
	{
?>
		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="row clearfix progress-box">
					<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
							<div class="project-info clearfix">
								<h5 style="text-align:center;padding-top:15px">Selamat Datang <?echo $_SESSION[nama]?> Penyedia Jasa Jahit Bandar Lampung</h5>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
						<div class="bg-white pd-20 box-shadow border-radius-5 margin-5 height-100-p">
							<img src="../images/hero.jpg">
							<p style="text-align:center;padding-top:15px">Membantu Menemukan Penyedia Jasa Jahit Terdekat Di Sekitar Anda</p>
						</div>
					</div>
				</div>
				
				<?php include('include/footer.php'); ?>
			</div>
		</div>
<?
	}
	
if(!empty($opt) && !empty($menu))
	{
	include "pages/$opt/$menu.php";
	}
?>
<script>
	var view = document.getElementById("tampilkan");
    navigator.geolocation.getCurrentPosition(showPosition);
	function showPosition(position) 
		{
        document.getElementById('latitude').value = position.coords.latitude ;
        document.getElementById('longitude').value = position.coords.longitude;
	 	}
	
</script>