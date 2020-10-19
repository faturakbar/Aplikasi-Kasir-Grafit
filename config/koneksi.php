<?php 
	$koneksi = mysqli_connect("sql206.epizy.com","epiz_27002752","1OFmswRPn54","epiz_27002752_db_kasir");

	if (mysqli_connect_error()) {
		echo "koneksi database Gagal". mysqli_connect_error();
	}
 ?>