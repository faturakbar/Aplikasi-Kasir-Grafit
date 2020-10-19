<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php");
}
include'../config/koneksi.php';

 
 
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_nota) as kodeTerbesar FROM tbl_penjualan");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
 
// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "BRG";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
 
 

 

if ($_POST['harga_minta']==="") {
    if (isset($_POST['keranjang'])) {
 
        $no_nota = $_POST['no_nota'];
        $barang = $_POST['barang'];
        $jumlah_jual = $_POST['jumlah_jual'];
        $data_barang = mysqli_query($koneksi," SELECT * FROM barang WHERE id_barang='$barang'");
        while ($tampil = mysqli_fetch_array($data_barang)) {
        $harga_jual = $tampil['harga_jual'];
        $sub_total = $harga_jual*$jumlah_jual;   
        $sql1 =  "INSERT INTO detail_penjualan_temp Values('$kodeBarang','$barang','$jumlah_jual','$sub_total')";
         mysqli_query($koneksi, $sql1);
   
        }
      
    }
  
} else {

    if (isset($_POST['keranjang'])) {
        

        $no_nota = $_POST['no_nota'];
        $barang = $_POST['barang'];
         
        $harga_minta = $_POST['harga_minta']; 
        $data_barang = mysqli_query($koneksi," SELECT * FROM barang WHERE id_barang='$barang'");
        while ($tampil = mysqli_fetch_array($data_barang)) {
        $harga_jual = $tampil['harga_jual'];
        $jumlah_jual = $harga_minta/$harga_jual; 
    
        $sql1 =  "INSERT INTO detail_penjualan_temp Values('$kodeBarang','$barang','$jumlah_jual','$harga_minta')";
         mysqli_query($koneksi, $sql1);
            
         
         
        }
      
    }
    
     
}


$Kembalian = 0;
if (isset($_POST['hitung'])){


    
    $data_barang = mysqli_query($koneksi," SELECT  id_barang, jumlah_jual, SUM(sub_total) as total from detail_penjualan_temp");
    while ($hasil = mysqli_fetch_array($data_barang)) {
        
    $total_bayar = $hasil['total'];
    $uang_cash = $_POST['uang_cash'];
    $Kembalian = $uang_cash-$total_bayar;
    $jumlah= $uang_cash;
    $dibayar= $total_bayar;
    $kembali = $Kembalian;

}
}

if (isset($_POST['reset'])) {

    

    $no_nota = $_POST['no_nota'];
    $tgl = date('Y-m-d');
    $jumlah = $_POST['jumlah'];
   
    $dibayar=$_POST['dibayar'];
    $kembali=$_POST['kembali'];
     
    $sql1 =  " INSERT INTO detail_penjualan (no_nota,id_barang,jumlah_jual,sub_total) SELECT no_nota,id_barang,jumlah_jual,sub_total FROM detail_penjualan_temp";
    $sql2 ="DELETE FROM detail_penjualan_temp";
    $sql3 =  "INSERT INTO tbl_penjualan Values('$kodeBarang','$tgl','$jumlah','$dibayar','$kembali')";
    mysqli_query($koneksi, $sql1);
 
    mysqli_query($koneksi, $sql2);
        
     mysqli_query($koneksi, $sql3);

 	echo"<script>window.alert('Data Penjualan Berhasil Ditambahakan')
	window.location='index.php'</script>";

    

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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Kasir</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" style="color:white;"    href="#">Aplikasi Kasir Grafit Printing</a>
         
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
            </ul>

            <?php 
            include'header.php';
            ?>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php 
                    include'menu.php';
                    ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Selamat datang di Aplikasi Kasir </h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-calculator"> Kasir</i>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#home-pills" data-toggle="tab">Kasir</a>
                                    </li>
                                    <li><a href="#profile-pills" data-toggle="tab">Data penjualan hari ini <?php echo tgl_indo(date('Y-m-d')); ?></a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home-pills"><br>
                                        <div class="alert">
                                            <div class="table-responsive table-bordered">
                                                <form action="" method="post">
                                                    <table class="table">


                                                    <tr>
                                                        <th>No Nota</th>
                                                        <td><input type="text" class="form-control" name="no_nota" value="<?php  echo $kodeBarang;?>"  readonly></td>
                                                    </tr>
                                             

                                                        <tr>
                                                            <th>Kategori Barang</th>
                                                            <td><select name="kategori_barang" id="kategori_barang" class="form-control" >
                                                                <option value=" ">--Pilih--</option>
                                                               
                                                         </select></td>
                                                     </tr>
                                                     <tr>
                                                            <th>Nama Barang</th>
                                                            <td><select name="barang" id="barang" class="form-control" >
                                                                <option value=" ">--Pilih--</option>
                                                               
                                                         </select></td>
                                                     </tr>
                                                     
                                                
                                                     <tr>
                                                        <th>Banyaknya</th>
                                                        <td><input type="number" class="form-control" name="jumlah_jual"  ></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Harga Permintaan </th>
                                                        <td><input type="text" class="form-control" name="harga_minta"   placeholder="Opsional"  > 
                                                        </td>
                                                        
                                                        
                                                    </tr>
                                                    <tr>
                                                        <th>Uang Cash</th>
                                                        <td><input type="text" class="form-control" name="uang_cash" placeholder="Uang Cash"  ></td>
                                                    </tr>
                                                 
                                                    <tr>
                                                        <th style="text-align: center;">Total Harus Di bayar</th>
                                                        <th style="text-align: center;">Kembalian</th>
                                                    </tr>
                                                    <input type="hidden" name="jumlah" value="<?php  echo $jumlah;?>">
                                                    <input type="hidden" name="dibayar" value="<?php  echo $dibayar?>">
                                                    <input type="hidden" name="kembali" value="<?php  echo $kembali;?>">
                                                                                        <?php
                                    
                                        $data_barang = mysqli_query($koneksi," SELECT  id_barang, jumlah_jual, SUM(sub_total) as total from detail_penjualan_temp");
                                        while ($hasil = mysqli_fetch_array($data_barang)) {
                                           ?>
                                           <tr  >
                                     
                                            <td><input type="text" style="height: 40pt; font-size: 15pt;" class="form-control" name="total_bayar" value="<?php echo"Rp ".number_format($hasil['total']); ?>"  ></td>
                                            <td><input type="text" style="height: 40pt; font-size: 15pt;" class="form-control" name="Kembalian" value="<?php echo"Rp.".number_format($Kembalian).",-"; ?>"  > </td>
        
                                            </tr>
                                        <?php } 
                                        ?>
                                                
                                                                                        
                                                    <tr>
                                                        <td colspan="2">
                                                           <input  class="btn btn-primary col-lg-3" type="submit" name="keranjang" value="Keranjang" style="width:200px">
                                                           <input class="btn btn-danger col-lg-3" type="submit" name="hitung" value="Hitung" style="width:200px">
                                                           <input class="btn btn-primary col-lg-3" type="submit" name="reset" value="Reset" style="width:200px">
                                                    </td>
                                                    </tr>
                                                </table>
                                            </form>
                                            
                                        </div>
                                         
                             
                                                        
                                    </div>
                                </div>

 

                                 <!-- Tab panes -->
                                 
                        <div>
     


                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->  <div class="panel panel-default">
    <div class="panel-heading">
                                Data Detail Penjualan Barang
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                             
                                    <div class="well well-sm">
                                    <form action="laporan_data_penjualan_temp.php" method="post">
                                     <input  type="hidden" name="no_nota" value="<?php  echo $kodeBarang;?>" >
                                     <input type="hidden" name="jumlah" value="<?php  echo $jumlah;?>">
                                        <input type="hidden" name="dibayar" value="<?php  echo $dibayar?>">
                                      <input type="hidden" name="kembali" value="<?php  echo $kembali;?>">
                                     <button class="fa fa-print btn btn-Success" type="submit" name="cetak_struk" value="Cetak Struk" onclick="return valid();">Cetak Struk
                                     </button>
                                     </form>
                                                 
                      
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </div>
                                       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Nota</th>
                                                <th>Kategori Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Banyaknya</th>
                                                <th>Subtotal</th>
                                                <th>Opsi</th>
                                              
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $data_barang = mysqli_query($koneksi," SELECT  * FROM detail_penjualan_temp   JOIN barang ON detail_penjualan_temp.id_barang = barang.id_barang
                                        JOIN kategori_barang ON kategori_barang.kode_kategori = barang.kode_kategori ORDER BY nama_barang ASC");
                                        while ($hasil = mysqli_fetch_array($data_barang)) {
                                           ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $hasil['no_nota']; ?></td>
                                            <td><?php echo $hasil['kategori_barang']; ?></td>
                                            <td><?php echo $hasil['nama_barang']; ?></td>
                                            <td><?php echo $hasil['jumlah_jual']; ?></td>
                                            <td><?php echo "Rp ".number_format($hasil['sub_total']); ?></td>
                                            <td class="center"><a onclick="return confirm('Yakin ingin menghapus data ini')" href="hapus_index.php?id_barang=<?php echo $hasil['id_barang']; ?>" class="fa fa-trash btn btn-danger"></a>
                                                
                                         </tr>
                                        <?php } 
           
                                        
                                        ?>
                                         

                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
</div>
<!-- /#wrapper -->

 
<!-- jQuery -->
<script src="../js/jquery-3.5.1.min.js"></script>

<!-- jQuery -->
<script src="jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>



<script >
		    $(document).ready(function(){
     
        	 
        		$.ajax({
            		type: "POST",
            		url: "get_kategori_barang.php",
                    cache: false, 
                   		success: function(msg){
                            $("#kategori_barang").html(msg);
                    		}
                        });
             
        		
            $("#kategori_barang").change(function(){
      	var kategori_barang = $("#kategori_barang").val();
          	$.ajax({
          		type: "POST",
              	url: "get_barang.php",
              	data: {kategori_barang: kategori_barang},
              	cache: false,
              	success: function(msg){
                  $("#barang").html(msg);
                }
            });
        });
 

        });
		</script>
</body>
</html>
