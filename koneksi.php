<?php 
	$koneksi =mysqli_connect("localhost","root","","db_kasir");
	if (mysqli_connect_error()) {
		echo "koneksi database Gagal". mysqli_connect_error();
	}
 ?>
