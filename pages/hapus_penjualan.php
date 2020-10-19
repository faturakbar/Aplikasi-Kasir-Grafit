<?php 

include'../config/koneksi.php';

$id_penjualan = mysqli_real_escape_string($koneksi, $_GET['no_nota']);

$sql1= "DELETE FROM tbl_penjualan Where no_nota='$id_penjualan'";
$sql2 ="DELETE FROM detail_penjualan Where no_nota='$id_penjualan'";

mysqli_query($koneksi, $sql1);
 
mysqli_query($koneksi, $sql2);



	echo"<script>window.alert('Data Berhasil Dihapus')
	window.location='data_penjualan.php'</script>";

 ?>