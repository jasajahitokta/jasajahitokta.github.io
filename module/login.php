<?php
error_reporting(0);
require_once ("../include/application_top.php");
require_once ("../include/connect.php");

$user 	= $_POST[user];
$pass   = md5($_POST[pass]);
//echo $pass;

if(empty($user) || empty($pass))
	{
	echo '<script>alert ("User atau Password Tidak boleh kosong.")</script>';
	print '<meta http-equiv="refresh" content="0;url=../../index.php"/>';
	exit();
	}
else
	{
	$d1 = mysql_fetch_array(mysql_query("SELECT * FROM pencari WHERE wa='$user'"));
	if(empty($d1[wa]))
		{
		$d2 = mysql_fetch_array(mysql_query("SELECT * FROM penjahit WHERE wa='$user'"));
		if(empty($d2['wa']))
			{
			echo "<script>alert ('Nomor Whatsapp Tidak Terdaftar.')</script>";
			print '<meta http-equiv="refresh" content="0;url=../../index.php"/>';
			exit();	
			}
		else
			{
			$_SESSION[idpenjahit] = $d2[idpenjahit];
			$_SESSION[wa]         = $d2[wa];
			$_SESSION[nama]       = $d2[nama];
			$_SESSION[foto]       = $d2[foto];
			$_SESSION[status]     = "penjahit"; 
			$s     = "Penjahit"; 
			}
		}
	else
		{
		if($d1['pass'] != $pass)
			{
			echo "<script>alert ('Password salah.')</script>";
			print '<meta http-equiv="refresh" content="0;url=../../index.php"/>';
			exit();	
			}
		else
			{
			$_SESSION[idpencari]  = $d1[idpencari];
			$_SESSION[wa]         = $d1[wa];
			$_SESSION[nama]       = $d1[nama];
			$_SESSION[foto]       = $d1[foto];
			$_SESSION[status]     = "pencari"; 
			$s     = "Pencari"; 
			}
		}
		
		echo "<script>alert ('Login Berhasil. Selamat Datang $s, $_SESSION[nama].')</script>";
		print '<meta http-equiv="refresh" content="0;url=../?opt="/>';
		exit();	
	}
?>