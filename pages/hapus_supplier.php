<?php 

include'../config/koneksi.php';

$id_supplier = mysqli_real_escape_string($koneksi, $_GET['id_supplier']);

mysqli_query($koneksi, "DELETE FROM supplier Where id_supplier='$id_supplier'");

	echo"<script>window.alert('Data Berhasil Dihapus')
	window.location='data_supplier.php'</script>";

 ?> 