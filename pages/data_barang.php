<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php");
}
include'../config/koneksi.php';

 
 


 
if (isset($_POST['simpan'])) {
  
    $kode_kategori = mysqli_real_escape_string($koneksi, $_POST['kode_kategori']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $satuan_barang = mysqli_real_escape_string($koneksi, $_POST['satuan_barang']);
    $harga_jual = mysqli_real_escape_string($koneksi, $_POST['harga_jual']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);

    
    mysqli_query($koneksi, "INSERT INTO barang Values('','$kode_kategori','$nama_barang','$satuan_barang','$harga_jual','$stok')");

   
    echo"<script>window.alert(' Barang Berhasil Ditambahkan')
    window.location='data_barang.php'</script>";
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
                        <h1 class="page-header">Data Barang</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Barang
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <div class="well well-sm">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                            + Tambah Data Barang
                                        </button>
                                                                        </div>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <form action="" method="post">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Form Tambah Data Barang</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                       
                                                            <label>Kategori Barang</label>
                                                           <select name="kode_kategori" id="" class="form-control" required="required">
                                                           <?php
                                                            //Membuat koneksi ke database 
                                                            $kon = mysqli_connect("sql206.epizy.com","epiz_27002752","1OFmswRPn54","epiz_27002752_db_kasir");
                                                            if (!$kon){
                                                                die("Koneksi database gagal:".mysqli_connect_error());
                                                            }
                                                                //Perintah sql untuk menampilkan semua data pada tabel kategori
                                                                $sql="select * from kategori_barang";

                                                                $hasil=mysqli_query($kon,$sql);
                                                                $no=0;
                                                                while ($data = mysqli_fetch_array($hasil)) {
                                                                $no++;

                                                            

                                                            ?>
                                                                <option value="<?php echo $data['kode_kategori'];?>"><?php echo $data['kategori_barang'];?></option>

                                                            

                                                            <?php 
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Barang</label>
                                                            <input type="text" class="form-control" name="nama_barang" placeholder="nama barang" autocomplete="off" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Satuan</label>
                                                            <select name="satuan_barang" id="" class="form-control" required="required">
                                                            <option value="BUAH">BUAH</option>
                                                            <option value="DOS">DOS</option>
                                                            <option value="RIM">RIM</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga Jual</label>
                                                            <input type="text" class="form-control" name="harga_jual" placeholder="Harga Jual" autocomplete="off" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Stok</label>
                                                            <input type="text" class="form-control" name="stok" placeholder="Stok" autocomplete="off" required="required">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" name="simpan" value="Input">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan Barang</th>
                                                <th>Harga Jual</th>
                                                <th>Stok</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        $data_barang = mysqli_query($koneksi," SELECT * FROM barang INNER JOIN kategori_barang ON barang.kode_kategori = kategori_barang.kode_kategori
                                        ORDER BY kategori_barang ASC");
                                        while ($hasil = mysqli_fetch_array($data_barang)) {
                                           ?>
                                           <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $hasil['kategori_barang']; ?></td>
                                            <td><?php echo $hasil['nama_barang']; ?></td>
                                            <td><?php echo $hasil['satuan_barang']; ?></td>
                                            <td><?php echo "Rp ".number_format($hasil['harga_jual']); ?></td>
                                            <td><?php echo $hasil['stok']; ?></td>
                                            <td class="center"><a onclick="return confirm('Yakin ingin menghapus data ini')" href="hapus.php?id_barang=<?php echo $hasil['id_barang']; ?>" class="fa fa-trash btn btn-danger"></a>
                                                <a class="fa fa-edit btn btn-success" href="edit.php?id_barang=<?php echo $hasil['id_barang']; ?>" data-toggle="tooltip" data-placement="top" title="Edit data barang"></a></td>
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
