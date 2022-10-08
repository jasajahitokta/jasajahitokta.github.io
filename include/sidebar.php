	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.php">
				<img src="../images/logo2.png" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
			<?
			if($_SESSION[status]=="admin")
				{
			?>
				<ul id="accordion-menu">
					<li>
						<a href="?opt=" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Halaman Utama</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=kepaladesa" class="dropdown-toggle no-arrow">
							<span class="fa fa-user"></span><span class="mtext">Kepala Desa</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=datapenduduk" class="dropdown-toggle no-arrow">
							<span class="fa fa-users"></span><span class="mtext">Data Penduduk</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=responpengajuansurat&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-envelope-open"></span><span class="mtext">Respon Pengajuan <?if($ts>0){?><span class="fi-burst-new text-danger new"></span><?}?></span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=pengajuansurat&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-envelope-open"></span><span class="mtext">Data Surat </span>
							
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=laporan&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-file"></span><span class="mtext">Laporan</span>
						</a>
					</li>
				</ul>
			<?
				}
			if($_SESSION[status]=="penjahit")
				{
			?>
				<ul id="accordion-menu">
					<li>
						<a href="?opt=" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Halaman Utama</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=karya&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-heart"></span><span class="mtext">Karya Anda</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=rating&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-star"></span><span class="mtext">Rating Anda</span>
						</a>
					</li>
				</ul>
			<?
				}
			if($_SESSION[status]=="pencari")
				{
			?>
				<ul id="accordion-menu">
					<li>
						<a href="?opt=" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">Halaman Utama</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=cari&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-search"></span><span class="mtext">Jasa Jahit Terdekat</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=semua&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-bookmark"></span><span class="mtext">Semua Jasa Jahit</span>
						</a>
					</li>
					<li>
						<a href="?opt=<?echo $_SESSION[status]?>&menu=rating&submenu=A" class="dropdown-toggle no-arrow">
							<span class="fa fa-star"></span><span class="mtext">Rating Anda</span>
						</a>
					</li>
				</ul>
			<?
				}
			?>
			</div>
		</div>
	</div>