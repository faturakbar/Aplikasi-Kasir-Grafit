<?php 
include'../config/koneksi.php';




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

$from=$_POST['from'];
$to=$_POST['to'];
?>

 
<!DOCTYPE html>
<html>
<head>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

	 
	<style type="text/css">

body {
	font-size:30px;
}

		table,tr,th,td{
			margin: auto; 
			border-collapse: collapse; 
			border: 1px solid black; 
			padding: 5px;
		}
		#a {
			border: 0px; 
		}

		 
	</style>
</head>
<body>
<div>

<br>
 

 <div style="font-weight:bold; margin-left:700px; font-size:25px;">
	<td > Jayapura, <?php echo tgl_indo(date('Y-m-d')); ?> </td>
	</div>
<div>
<br>
<div>
<img src="Grafit_b.png" style="width:830px;  margin-left:27px;;" alt="">

</div>


<br>
 
 
 
 </table>
 

</div>
<div class="panel-heading">
<div class="panel-body">
<div class="table-responsive">
	
<div >
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:17px; text-align:center;" >
		<tr style="text-align:center;">
			<th style="text-align:center;">No</th>
			<th style="text-align:center;">Nama Pelanggan</th>
		    <th style="text-align:center;">Kategori Barang</th>
			<th style="text-align:center;">Nama Barang</th>
			<th style="text-align:center;">Harga Jual</th>
			<th style="text-align:center;">Tanggal</th>
			<th style="text-align:center;">Banyaknya</th>
			<th style="text-align:center;">Subtotal</th>
			
		</tr>
		</tr>
		<?php

		$no = 1;
		$data_barang = mysqli_query($koneksi,"    SELECT * FROM hutang JOIN barang ON barang.id_barang = hutang.id_barang
		JOIN kategori_barang ON barang.kode_kategori = kategori_barang.kode_kategori   WHERE (nama_pelanggan
		BETWEEN '$from' AND '$to') ");
		while ($hasil = mysqli_fetch_array($data_barang)) {
			?>
			<tr>
			<td><?php echo $no++; ?></td>
                                            <td><?php echo $hasil['nama_pelanggan']; ?></td>
                                            <td><?php echo $hasil['kategori_barang']; ?></td>
                                            <td><?php echo $hasil['nama_barang']; ?></td>
											<td><?php echo  "Rp ".number_format($hasil['harga_jual']); ?></td>
											<td><?php echo  tgl_indo($hasil['tgl_hutang']); ?></td>
                                            <td><?php echo $hasil['banyaknya']; ?></td>
                                            <td><?php echo "Rp ".number_format($hasil['total_hutang']); ?></td>
				
			

			</tr>
		<?php } ?>



	</table>
	</div>
	</div>
	</div>
	</div>
	<br>

	<div  style="position:relative; left:750px; font-weight:bold;  "> 
	<tr>
	<td colspan="5">Jumlah</td>
	<?php

		$no = 1;
		$data_barang = mysqli_query($koneksi,"  SELECT   SUM(total_hutang) as total_pendapatan from hutang   WHERE (nama_pelanggan
		BETWEEN '$from' AND '$to') ");
		while ($hasil = mysqli_fetch_array($data_barang)) {
			?>
		
		 	<td style="text-align:center; font-weight:bold"><?php echo"Rp.". number_format($hasil['total_pendapatan']).",-"; ?></td>
			</tr>
			<?php } ?>

			</div>
			<br>


<div style="margin-left:0px;">
 
	<h4  style="margin-left:40px; font-weight:normal; font-style:italic; position:absolute; font-size:25px;">Terima Kasih Atas Kepercayaan Anda
	<hr style="margin-bottom:50px;"></h4>
<br>
</div>
<div  style="margin-left:23px;">
	<h4  style="margin-left:750px; font-weight:bold; font-size:25px;  position:absolute;">Hormat Kami,
	</div>
 
 
 
	</div>
	<script>
		window.print();
	</script>
</body>
</html>