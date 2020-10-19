<?php 
include'../config/koneksi.php';

$id_barang = mysqli_real_escape_string($koneksi, $_GET['id_barang']);

if (isset($_POST['update'])) {
    $kode_kategori = mysqli_real_escape_string($koneksi, $_POST['kode_kategori']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $satuan_barang = mysqli_real_escape_string($koneksi, $_POST['satuan_barang']);
    $harga_jual = mysqli_real_escape_string($koneksi, $_POST['harga_jual']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);

    mysqli_query($koneksi, "UPDATE barang SET kode_kategori='$kode_kategori', nama_barang='$nama_barang', satuan_barang='$satuan_barang', harga_jual='$harga_jual',
    stok='$stok' WHERE id_barang='$id_barang'");

    echo"<script>window.alert('data berhasil diupdate')
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
                        <h1 class="page-header">Update Data Penjualan</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <form action="" method="post">
                    <div class="row">
                        <?php
                        $data_barang = mysqli_query($koneksi," SELECT * FROM barang INNER JOIN kategori_barang ON barang.kode_kategori = kategori_barang.kode_kategori WHERE id_barang='$id_barang'");
                        $no=0;
                         while ($tampil = mysqli_fetch_array($data_barang)) {
                            $no++;
                            ?>
                           
                            <div class="col-lg-6">

                            
                            <div class="form-group">
                                    <label>Kategori Barang</label>
                                    <select name="kode_kategori" id="" class="form-control" required="required">
                                    <?php
                                                            //Membuat koneksi ke database 
                                                            $kon = mysqli_connect("localhost",'root',"","db_kasir");
                                                            if (!$kon){
                                                                die("Koneksi database gagal:".mysqli_connect_error());
                                                            }
                                                                //Perintah sql untuk menampilkan semua data pada tabel kategori
                                                                $sql="SELECT * FROM kategori_barang ";

                                                                $hasil=mysqli_query($kon,$sql);
                                                                
                                                                while ($data = mysqli_fetch_array($hasil)) {
                                        
                                                                    if ($tampil['kode_kategori']==$data['kode_kategori']) {
                                                                        $select="selected";
                                                                       }else{
                                                                        $select="";
                                                                       }
                                                                       
                                                            //echo "<option   $select>".$data['kategori_barang']." </option>";
                                                        ?>
                                                        <option value="<?php echo $data['kode_kategori'];?>"
                                                         <?php echo $select;?>><?php echo $data['kategori_barang'];?></option>


                                                        <?php    
                                                        
                                                        }
                                                               
                                    ?>
                                    </select>
                                </div>
                           
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" value="<?php echo $tampil['nama_barang']; ?>" placeholder="nama barang" required="required">
                                </div>

                                
                                <div class="form-group">
                                                            <label>Satuan</label>
                                                            <select name="satuan_barang" id="" class="form-control" required="required">
                                                            <?php
                                                                if ($tampil['satuan_barang']=='BUAH') echo "<option value='BUAH' selected>BUAH</option>";
                                                                else echo "<option value='BUAH'>BUAH</option>";  

                                                                if ($tampil['satuan_barang']=='DOS') echo "<option value='DOS' selected>DOS</option>";
                                                                else echo "<option value='DOS'>DOS</option>";  

                                                                if ($tampil['satuan_barang']=='RIM') echo "<option value='RIM' selected>RIM</option>";
                                                                else echo "<option value='RIM'>RIM</option>";  
                                                                ?> 
                                                            </select>
                                                        </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="text" class="form-control" name="harga_jual" value="<?php echo $tampil['harga_jual']; ?>" placeholder="Harga Jual" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="text" class="form-control" name="stok" value="<?php echo $tampil['stok']; ?>" placeholder="Stok" autocomplete="off" required="required">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="update" value="Update">
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
  

    </body>
    </html>
