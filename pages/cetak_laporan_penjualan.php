<?php 
include'../config/koneksi.php';
$total_semua_keuntungan = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan");
while ($r=mysqli_fetch_array($total_semua_keuntungan)) {
	$semua_keuntungan [] = $r['keuntungan'];
}
function tgl_indo($tanggal){
	$bulan = array (
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
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

	<h1 style="text-align: center; font-size: 14pt; font-family: times new rowman;">Data Laporan Penjualan ATK</h1>

	

	<table>
		<tr>
			<th>No</th>
			<th>tgl pembelian</th>
			<th>Nama Barang</th>
			<th>Jumlah dibeli</th>
			<th>Harga Normal</th>
			<th>Harga Jual</th>
			<th>Keuntungan</th>
		</tr>
		<?php
		$no = 1;
		$data_penjualan = mysqli_query($koneksi," SELECT * FROM tbl_penjualan INNER JOIN barang ON tbl_penjualan.id_barang = barang.id_barang");
		while ($tampil = mysqli_fetch_array($data_penjualan)) {
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo tgl_indo($tampil['tgl']); ?></td>
				<td><?php echo $tampil['nama_barang']; ?></td>
				<td><?php echo $tampil['jumlah']; ?></td>
				<td><?php echo"Rp.".number_format($tampil['harga_asli']).",-"; ?></td>
				<td><?php echo"Rp.".number_format($tampil['harga_jual']).",-"; ?></td>
				<td><?php echo"Rp.".number_format($tampil['keuntungan']).",-"; ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="7"><?php $keuntungan_semua = array_sum($semua_keuntungan);
			echo "<b>Total semua keuntungan penjualan Rp.".number_format($keuntungan_semua).",-</b>"; ?></td>
		</tr>
	</table>
	<script>
		window.print();
	</script>
</body>
</html>