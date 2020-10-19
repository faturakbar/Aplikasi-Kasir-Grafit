<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php");
}
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aplikasi Kasir</title>

    <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->


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
                        
                        <h1 class="page-header">Data Pembelian</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">
                                Data Pembelian
                            </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="well well-sm">
                                        <a  class="btn btn-primary" href="tambah_pembelian.php" >
                                            + Tambah Data Pembelian 
                                         </a>
                                     
                                    </div>
          
                                    
                                                           
                                    </div>
                                   
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Supplier</th>
                                                <th>Tgl Pembelian</th>
                                                <th>Jumlah Di Bayar</th>
                                                <th>Total Pembelian</th>
                                                <th>Dibayar</th>
                                                <th>Kembali</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $data_penjualan = mysqli_query($koneksi," SELECT * FROM tbl_pembelian INNER JOIN supplier ON tbl_pembelian.id_supplier = supplier.id_supplier
                                        ORDER BY tgl_pembelian ASC");
                                        while ($tampil = mysqli_fetch_array($data_penjualan)) {
                                           ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $tampil['nama_supplier']; ?></td>
                                            <td><?php echo tgl_indo($tampil['tgl']); ?></td>
                                               <td class="center"><?php echo"Rp.".number_format($tampil['total_pembelian']).",-"; ?></td>
                                            <td class="center"><?php echo"Rp.".number_format($tampil['dibayar']).",-"; ?></td>
                                            <td class="center"><?php echo"Rp.".number_format($tampil['kembali']).",-"; ?></td>
                                            <td class="center"><a onclick="return confirm('Yakin ingin menghapus data ini')" href="hapus_penjualan.php?no_nota=<?php echo $tampil['no_nota']; ?>" class="fa fa-trash btn btn-danger"></a>
                                            <a class="fa fa-info btn btn-primary" href="detail_penjualan.php?no_nota=<?php echo $tampil['no_nota']; ?>" data-toggle="tooltip" data-placement="top" target="_blank" title="Detail Penjualan"></a></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
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
