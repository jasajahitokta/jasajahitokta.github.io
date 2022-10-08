<?php
	function tgl_indo1($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	
	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 
			
function Terbilang($satuan)
	{
	$huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
	if ($satuan < 12)
		return " " . $huruf[$satuan];
	elseif ($satuan < 20)
		return Terbilang($satuan - 10) . " BELAS";
	elseif ($satuan < 100)
		return Terbilang($satuan / 10) . " PULUH" . Terbilang($satuan % 10);
	elseif ($satuan < 200)
		return " SERATUS" . Terbilang($satuan - 100);
	elseif ($satuan < 1000)
		return Terbilang($satuan / 100) . " RATUS" . Terbilang($satuan % 100);
	elseif ($satuan < 2000)
		return " SERIBU" . Terbilang($satuan - 1000);
	elseif ($satuan < 1000000)
		return Terbilang($satuan / 1000) . " RIBU" . Terbilang($satuan % 1000);
	elseif ($satuan < 1000000000)
		return Terbilang($satuan / 1000000) . " JUTA" . Terbilang($satuan % 1000000);
	elseif ($satuan <= 1000000000)
		echo "Maaf Tidak Dapat di Prose Karena Jumlah Uang Terlalu Besar ";
	}
	
	function selisihHari($tglAwal, $tglAkhir)
		{
		// list tanggal merah selain hari minggu
		$tglLibur = Array("");

		// memecah string tanggal awal untuk mendapatkan
		// tanggal, bulan, tahun
		$pecah1 = explode("-", $tglAwal);
		$date1 = $pecah1[2];
		$month1 = $pecah1[1];
		$year1 = $pecah1[0];

		// memecah string tanggal akhir untuk mendapatkan
		// tanggal, bulan, tahun
		$pecah2 = explode("-", $tglAkhir);
		$date2 = $pecah2[2];
		$month2 = $pecah2[1];
		$year2 =  $pecah2[0];

		// mencari total selisih hari dari tanggal awal dan akhir
		$jd1 = GregorianToJD($month1, $date1, $year1);
		$jd2 = GregorianToJD($month2, $date2, $year2);

		$selisih = $jd2 - $jd1;

		// proses menghitung tanggal merah dan hari minggu
		// di antara tanggal awal dan akhir
		for($i=1; $i<=$selisih; $i++)
			{
				// menentukan tanggal pada hari ke-i dari tanggal awal
				$tanggal = mktime(0, 0, 0, $month1, $date1+$i, $year1);
				$tglstr = date("Y-m-d", $tanggal);

				// menghitung jumlah tanggal pada hari ke-i
				// yang masuk dalam daftar tanggal merah selain minggu
				if (in_array($tglstr, $tglLibur))
				{
				   $libur1++;
				}

				// menghitung jumlah tanggal pada hari ke-i
				// yang merupakan hari minggu
				if ((date("N", $tanggal) == 7))
				{
				   $libur2++;
				}
			}

		// menghitung selisih hari yang bukan tanggal merah dan hari minggu
		//return $selisih-$libur1-$libur2;
		return $selisih;
		}
?>
