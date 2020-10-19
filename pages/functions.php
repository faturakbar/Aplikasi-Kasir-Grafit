<?php 
// koneksi ke database
$conn = mysqli_connect("localhost","root","","db_kasir");

// tambah data pembeli 

function tambah ($data) {
	 global $conn;
	 // ambil data dari tiap elemen dalam form 
	$no_nota = htmlspecialchars($data['no_nota']);
 	$id_supplier = htmlspecialchars($data['id_supplier']);
 	$tanggal_pembelian = htmlspecialchars($data['tgl_pembelian']);
 	$total_pembelian= htmlspecialchars($data['total_pembelian']);
 	$dibayar= htmlspecialchars($data['dibayar']);
 	$kembali= htmlspecialchars($data['kembali']);


	
	 
	 // query insert data 
	 $query = "INSERT INTO tb_pembelian Values 
	 			('','$id_supplier', '$tanggal_pembelian','$total_pembelian','$dibayar','$kembali')";
	 mysqli_query($conn,$query);
	 return mysqli_affected_rows($conn);
}


 ?>