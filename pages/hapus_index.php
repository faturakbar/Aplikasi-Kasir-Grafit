<?php 

include'../config/koneksi.php';

$id_barang = mysqli_real_escape_string($koneksi, $_GET['id_barang']);


mysqli_query($koneksi, "DELETE FROM detail_penjualan_temp Where id_barang='$id_barang'");

	echo"<script>window.alert('Data Berhasil Dihapus')
	window.location='index.php'</script>";

 ?> 