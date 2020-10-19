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
                        
                        <h1 class="page-header">Data Penjualan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            
                            <div class="panel-heading">
                                Data Penjualan
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                <div class="well well-sm">
                                        <button  style="font-size: 14pt;" type="button" class=" fa fa-print btn btn-success" data-toggle="modal" data-target="#myModal">
                                        Cetak 
                                        </button>
                                        
                                    </div>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="laporan_data_penjualan.php"  method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Cetak Data Penjualan</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <div class="form-group">
                                                            <label>Start Date</label>
                                                            <input type="date" class="form-control" name="from" id="stayf" placeholder="nama barang"   value="<?php echo date('Y-m-d'); ?>"autocomplete="off" required="required">
                                                           
                                                        </div>

                                                        <div class="form-group">
                                                            <label>End Date</label>
                                                            <input type="date" class="form-control" name="end" id="stayf" placeholder="nama barang"   value="<?php echo date('Y-m-d'); ?>"autocomplete="off" required="required">
                                                        </div>


                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel
                                                    </button>
                                                    <button class="btn btn-info" type="submit" name="submit" value="proses" onclick="return valid();">Search
                                                    </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    
                                                           
                                    </div>
                                   
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Nota</th>
                                                <th>Tgl Pembelian</th>
                                                <th>Jumlah Di Bayar</th>
                                                <th>Total Pembelian</th>
                                                <th>Kembali</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $data_penjualan = mysqli_query($koneksi," SELECT * FROM tbl_penjualan ");
                                        while ($tampil = mysqli_fetch_array($data_penjualan)) {
                                           ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $tampil['no_nota']; ?></td>
                                            <td><?php echo tgl_indo($tampil['tgl']); ?></td>
                                               <td class="center"><?php echo"Rp.".number_format($tampil['jumlah']).",-"; ?></td>
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
