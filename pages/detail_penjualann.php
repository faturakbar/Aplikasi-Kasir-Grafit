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
                        <h1 class="page-header">Data Detail  Penjualan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Detail Penjualan
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
                                        <form action="laporan_detail_penjualann.php"  method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Cetak Data Detail Penjualan</h4>
                                                    </div>
                                                    <div class="modal-body">
                
                                                        <div class="form-group">
                                                            <label>Kode Barang Awal</label>
                              
                                                            <select name="from" id="no_nota" class="form-control" >
                                                            <?php
                                                            //Membuat koneksi ke database 
                                                            $kon = mysqli_connect("sql206.epizy.com","epiz_27002752","1OFmswRPn54","epiz_27002752_db_kasir");
                                                            if (!$kon){
                                                                die("Koneksi database gagal:".mysqli_connect_error());
                                                            }
                                                                //Perintah sql untuk menampilkan semua data pada tabel kategori
                                                                $sql="select * from tbl_penjualan order by no_nota";

                                                                $hasil=mysqli_query($kon,$sql);
                                                                $no=0;
                                                                while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;

                                                            

                                                            ?>
                                                                <option value="<?php echo $data['no_nota'];?>"><?php echo $data['no_nota'];?></option>

                                                            

                                                            <?php 
                                                            }
                                                            ?>
                                                         </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Kode Barang Akhir</label>
                              
                                                            <select name="to" id="no_nota" class="form-control" >
                                                            <?php
                                                            //Membuat koneksi ke database 
                                                            $kon = mysqli_connect("sql206.epizy.com","epiz_27002752","1OFmswRPn54","epiz_27002752_db_kasir");
                                                            if (!$kon){
                                                                die("Koneksi database gagal:".mysqli_connect_error());
                                                            }
                                                                //Perintah sql untuk menampilkan semua data pada tabel kategori
                                                                $sql="select * from tbl_penjualan order by no_nota";

                                                                $hasil=mysqli_query($kon,$sql);
                                                                $no=0;
                                                                while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;

                                                            

                                                            ?>
                                                                <option value="<?php echo $data['no_nota'];?>"><?php echo $data['no_nota'];?></option>

                                                            

                                                            <?php 
                                                            }
                                                            ?>
                                                         </select>
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
                                                <th>Kategori Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga Jual</th>
                                                <th>Jumlah Jual</th>
                                                <th>Sub Total</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $data_penjualan = mysqli_query($koneksi," SELECT * FROM detail_penjualan JOIN barang ON barang.id_barang = detail_penjualan.id_barang
                                        JOIN kategori_barang ON barang.kode_kategori = kategori_barang.kode_kategori order by no_nota");
                                        while ($tampil = mysqli_fetch_array($data_penjualan)) {
                                           ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $tampil['no_nota']; ?></td>
                                            <td><?php echo $tampil['kategori_barang']; ?></td>
                                            <td><?php echo $tampil['nama_barang']; ?></td>
                                            <td class="center"><?php echo"Rp.".number_format($tampil['harga_jual']).",-"; ?></td>
                                            <td><?php echo $tampil['jumlah_jual']; ?></td>
                                            <td class="center"><?php echo"Rp.".number_format($tampil['sub_total']).",-"; ?></td>
                                            <td class="center"><a onclick="return confirm('Yakin ingin menghapus data ini')" href="hapus_penjualan.php?no_nota=<?php echo $tampil['no_nota']; ?>" class="fa fa-trash btn btn-danger"></a></td>
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
