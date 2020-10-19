<?php
	include '../config/koneksi.php';
 
	echo "<option value=''>Pilih Kategori Barang</option>";
 
  
    //Membuat koneksi ke database 
    $kon = mysqli_connect("sql206.epizy.com","epiz_27002752","1OFmswRPn54","epiz_27002752_db_kasir");
    if (!$kon){
        die("Koneksi database gagal:".mysqli_connect_error());
    }
        //Perintah sql untuk menampilkan semua data pada tabel kategori
        $sql="select * from kategori_barang";

        $hasil=mysqli_query($kon,$sql);
        
        while ($data = mysqli_fetch_array($hasil)) {
      
		echo "<option value='" . $data['kode_kategori'] . "'>" . $data['kategori_barang'] . "</option>";
	}
?>