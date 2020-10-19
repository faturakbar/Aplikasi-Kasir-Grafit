 
<?php
define('DB_SERVER','sql206.epizy.com');
define('DB_USER','epiz_27002752');
define('DB_PASS' ,'1OFmswRPn54');
define('DB_NAME', 'epiz_27002752_db_kasir');

 
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Memanggil file fpdf yang anda tadi simpan di folder htdoc
require('fpdf.php');
{
date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
}

// Ukuran kertas PDF
$pdf = new FPDF("P","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
//judul
$pdf->Cell(17,0.7,"LAPORAN PENJUALAN DAN FOTOCOPY ATK ",0,0,'C');



$pdf->ln(1);
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//Format tanggal
$pdf->Cell(6,0.7,"Di Cetak Pada Tanggal : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
 
 // st font yang ingin anda gunakan
$pdf->SetFont('Arial','B',10);
// queri yang ingin di tampilkan di tabel sehingga ketika diubah tidak akan berpengaruh
// Kode 1, 0, 'C' dan banyak kode di bawah adalah ukuran lebar tabel ubah jika tidak sesuai keinginan anda.
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'No Nota', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Penjualan', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Total Pembelian', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Di Bayar', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Kembali', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
// from dan edn ini adalah nama dari form star_filter.php yang berfungsi untuk memanggil tanggal yang di atur
$from=$_POST['from'];
$end=$_POST['end'];

// memanggil database
$query=mysqli_query($con,"select * from tbl_penjualan WHERE (tgl BETWEEN '$from' AND '$end')");
while($lihat=mysqli_fetch_array($query)){
    


// Queri yang ingin ditampilkan yang berada di database
 $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
 $pdf->Cell(2.5, 0.8, $lihat['no_nota'], 1, 0,'C');
 $pdf->Cell(4, 0.8, $lihat  ['tgl'], 1, 0,'C');
 $pdf->Cell(4, 0.8, "Rp.".number_format($lihat['dibayar']),1, 0, 'C');
 $pdf->Cell(4, 0.8, "Rp.".number_format($lihat['jumlah']),1, 0, 'C');
 $pdf->Cell(2, 0.8, "Rp.".number_format($lihat['kembali']), 1, 1,'C');
 

 $no++;
}


//menghitung jumlah pendapatan
$data = mysqli_query($con," SELECT   SUM(dibayar) as total_pendapatan from tbl_penjualan where    (tgl BETWEEN '$from' AND '$end') ");
while ($hasil = mysqli_fetch_array($data)) {
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
 
$pdf->Cell(5,0.7,"Pendapatan : "."Rp.".number_format($hasil['total_pendapatan']).",-",0,0,'C');
}

 
 
// Nama file ketika di print
$pdf->Output("Laporan Data Penjualan .pdf","I");

?>