<?php
    include '../config/koneksi.php';
    $kategori_barang = $_POST['kategori_barang'];


	echo "<option value=''>Pilih Barang</option>";
   
    //Membuat koneksi ke database 
    $kon = mysqli_connect("localhost","root","","db_kasir");
    if (!$kon){
        die("Koneksi database gagal:".mysqli_connect_error());
    }
        //Perintah sql untuk menampilkan semua data pada tabel kategori
        $sql="select * from barang  WHERE kode_kategori=$kategori_barang ORDER BY nama_barang ASC";

        $hasil=mysqli_query($kon,$sql);
        
        while ($data = mysqli_fetch_array($hasil)) {
      
		echo "<option value='" . $data['id_barang'] . "'>" . $data['nama_barang'] . "</option>";
	}
?>
