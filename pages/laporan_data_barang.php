<?php 
include'../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan data barang</title>
	<style type="text/css">
		table,tr,th,td{
			margin: auto; 
			border-collapse: collapse; 
			border: 1px solid black; 
			padding: 5px;
		}
	</style>
</head>
<body>

	<h1 style="text-align: center; font-size: 14pt; font-family: times new rowman;">Data Barang</h1>

	

	<table>
		<tr>
			<th>No</th>
			<th>Nama barang</th>
			<th>Harga Asli</th>
			<th>Harga jual</th>
		</tr>
		<?php
		$no = 1;
		$data_barang = mysqli_query($koneksi," SELECT * FROM barang");
		while ($tampil = mysqli_fetch_array($data_barang)) {
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $tampil['nama_barang']; ?></td>
				<td><?php echo"Rp.".number_format($tampil['harga_asli']).",-"; ?></td>
				<td><?php echo"Rp.".number_format($tampil['harga_jual']).",-"; ?></td>
			</tr>
		<?php } ?>
	</table>
	<script>
		window.print();
	</script>
</body>
</html>