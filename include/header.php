<?
if($_SESSION[status]=="penjahit")
	{
	$dP = mysql_fetch_array(mysql_query("SELECT * FROM penjahit WHERE idpenjahit='$_SESSION[idpenjahit]'"));
	}
if($_SESSION[status]=="pencari")
	{
	$dP = mysql_fetch_array(mysql_query("SELECT * FROM pencari WHERE idpencari='$_SESSION[idpencari]'"));
	}
?>
	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="index.php">
					<img src="../images/favicon.png" alt="" class="mobile-logo">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon" style="background:no-repeat center url('foto/<?echo $dP[foto]?>');width:40px; height:40px; border-radius:50%;background-size: cover;"></span>
						<span class="user-name"><?echo $_SESSION[nama]?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="?opt=<?echo $_SESSION[status]?>&menu=profile"><i class="fa fa-user-md" aria-hidden="true"></i> Profile</a>
						<a class="dropdown-item" href="module/logout.php" onclick="return confirm('Anda yakin akan keluar?')"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>