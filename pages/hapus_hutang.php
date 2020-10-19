<?php 

include'../config/koneksi.php';

$id_hutang = mysqli_real_escape_string($koneksi, $_GET['id_hutang']);

 $sql1= "DELETE FROM hutang Where id_hutang='$id_hutang'";
 mysqli_query($koneksi, $sql1);
 


	echo"<script>window.alert('Data Berhasil Dihapus')
	window.location='data_hutang.php'</script>";

 ?> 