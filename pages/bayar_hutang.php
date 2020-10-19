<?php 
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


$id_hutang = mysqli_real_escape_string($koneksi, $_GET['id_hutang']);
 
$kembalian = 0; 
if (isset($_POST['hitung'])) {
    $dibayar = $_POST['dibayar'];
   
    $total_hutang = $_POST['total_hutang'] ;
    $kembalian = $dibayar - $total_hutang;
    $dibayar_a = $dibayar;
 
    
}


if (isset($_POST['bayar'])) {
   
    $no_nota = $_POST['no_nota'];
    $id_barang = $_POST['id_barang'];
    $tgl = date('Y-m-d');
    $banyaknya = $_POST['banyaknya'];  
    $total_hutang=$_POST['total_hutang'];
    $dibayar_a=$_POST['dibayar_a'];
    $kembalian=$_POST['kembalian'];
    
     
    $sql1 ="INSERT INTO detail_penjualan Values('$no_nota','$id_barang','$banyaknya','$total_hutang') ";

    $sql2 =  "INSERT INTO tbl_penjualan Values('$no_nota','$tgl', '$dibayar_a', '$total_hutang','$kembalian')";
     
    mysqli_query($koneksi, $sql1);
    mysqli_query($koneksi, $sql2);

    $sql3= "DELETE FROM hutang Where id_hutang='$id_hutang'";
    mysqli_query($koneksi, $sql3);

        
    echo"<script>window.alert('Hutang Berhasil DiBayar')
    window.location='data_hutang.php'</script>";
 
    

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

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.html">Aplikasi Kasir</a>
                
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
            </ul>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown navbar-inverse">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
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
                        <h1 class="page-header">Bayar Hutang</h1>
                        
                    </div>
                      
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <form action="" method="post">
                    <div class="row">
                        <?php
                        $hutang = mysqli_query($koneksi,"    SELECT * FROM hutang JOIN barang ON barang.id_barang = hutang.id_barang
                        JOIN kategori_barang ON barang.kode_kategori = kategori_barang.kode_kategori  WHERE id_hutang='$id_hutang'");
                        while ($tampil = mysqli_fetch_array($hutang)) {
                            ?>
                            <div class="col-lg-6">

                            <div class="form-group">
                                    <label>No Nota</label>
                                     <a href="#profile-pills" data-toggle="tab" style="color:white"> <?php echo tgl_indo(date('Y-m-d')); ?></a>
                                    <input type="text" class="form-control" name="no_nota" value="<?php echo  $kodeBarang?>" placeholder="kategori barang" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Kategori Barang</label>
                                    <input type="text" class="form-control" name="kategori_barang" value="<?php echo $tampil['kategori_barang']; ?>" placeholder="kategori barang" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="barang" id="barang" value="<?php echo $tampil['nama_barang']; ?>" placeholder="kategori barang" required="required">
                                      <input type="hidden"name="id_barang" value="<?php echo $tampil['id_barang']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Hutang</label>
                                    <input type="text" class="form-control" name="tgl_hutang" value="<?php echo tgl_indo($tampil['tgl_hutang']); ?>" placeholder="kategori barang" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Banyaknya</label>
                                    <input type="text" class="form-control" name="banyaknya" value="<?php echo $tampil['banyaknya']; ?>" placeholder="kategori barang" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Total Hutang</label>
                                    <input type="text" class="form-control" name="total_hutang" value="<?php echo  "Rp ".number_format($tampil['total_hutang']); ?>" placeholder="kategori barang" required="required">
                                    <input type="hidden" class="form-control" name="total_hutang" value="<?php echo   $tampil['total_hutang'] ?>" placeholder="kategori barang" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Dibayar</label>
                                    <input type="text" class="form-control" name="dibayar"   placeholder="dibayar"    >
                                    <input type="hidden" name="dibayar_a" value="<?php echo  $dibayar_a ?>">
                                    
                                </div>
                                <div class="form-group">
                                    <label>Kembali</label>
                                    <input type="text" class="form-control" name="kembalian"   placeholder="kembali"  value="<?php echo"Rp.".number_format($kembalian).",-"; ?>"required="required">
                                    <input type="hidden" class="form-control" name="kembalian"   placeholder="kembali"  value="<?php echo $kembalian?>"required="required">
                                </div>


                                    
                                
                                
                                <div class="form-group">
                                     <input type="submit" class="btn btn-danger" name="hitung" value="hitung">
                                    <input type="submit" class="btn btn-primary" name="bayar" value="Bayar">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </form>

                <!-- /.row -->
                <div class="row">

                    <!-- /.col-lg-6 -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/startmin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>

    <script>
            // tooltip demo
            $('.tooltip-demo').tooltip({
                selector: "[data-toggle=tooltip]",
                container: "body"
            })

            // popover demo
            $("[data-toggle=popover]").popover()
        </script>

    </body>
    </html>
