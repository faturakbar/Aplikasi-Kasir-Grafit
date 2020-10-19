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
 
<div style="position:relative; left:27px; font-weight:bold; " >
 <td > No Nota:</td>
 
 <td >   <?php echo $no_nota=$_POST['no_nota']; ?> </td>
   
 </div>
 
 
 </table>
 

</div>
<div class="panel-heading">
<div class="panel-body">
<div class="table-responsive">
	
<div >
	<table class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:25px; text-align:center;" >
		<tr style="text-align:center;">
			<th style="text-align:center;">No</th>
			<th style="text-align:center;">Nama Barang</th>
		    <th style="text-align:center;">Nama Barang</th>
			<th style="text-align:center;">Harga</th>
			<th style="text-align:center;">Banyaknya</th>
			<th style="text-align:center;">Subtotal</th>
			
		</tr>
		</tr>
		<?php
		$no = 1;
		$data_barang = mysqli_query($koneksi," SELECT  * FROM detail_penjualan_temp   JOIN barang ON detail_penjualan_temp.id_barang = barang.id_barang
		JOIN kategori_barang ON kategori_barang.kode_kategori = barang.kode_kategori  ORDER BY nama_barang ASC");
		while ($tampil = mysqli_fetch_array($data_barang)) {
			?>
			<tr>
				<td style="text-align:center;"><?php echo $no++; ?></td>
				<td style="text-align:center;"><?php echo $tampil['kategori_barang']; ?></td>
				<td style="text-align:center;"><?php echo $tampil['nama_barang']; ?></td>
				<td style="text-align:center;"><?php echo"Rp.".number_format($tampil['harga_jual']).",-"; ?></td>
				<td style="text-align:center;"><?php echo $tampil['jumlah_jual']; ?></td>
				<td style="text-align:center;"><?php echo"Rp.".number_format($tampil['sub_total']).",-"; ?></td>
				
			

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
			 
			 
			<td style="text-align:center; font-weight:bold"><?php echo"Rp.".number_format($dibayar=$_POST['dibayar']).",-"; ?></td>
			</tr>
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