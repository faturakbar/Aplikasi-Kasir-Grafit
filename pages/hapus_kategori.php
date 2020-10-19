<?php 

include'../config/koneksi.php';

$kode_kategori = mysqli_real_escape_string($koneksi, $_GET['kode_kategori']);

mysqli_query($koneksi, "DELETE FROM kategori_barang Where kode_kategori='$kode_kategori'");

	echo"<script>window.alert('Data Berhasil Dihapus')
	window.location='data_kategori_barang.php'</script>";

 ?> 