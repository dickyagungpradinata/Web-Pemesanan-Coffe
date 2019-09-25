<?php
ini_set('display_errors', 'off');
error_reporting(E_ALL);
include_once 'config/dao.php';
$dao = new Dao();
$aksi = $_POST['aksi'];
$id_ktgr = $_POST['id_ktgr'];
$nm_ktgr = $_POST['nm_ktgr'];
if ($aksi == "save") {

    $query = "INSERT INTO kategori(nm_ktgr) VALUES('$nm_ktgr')";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.kategori.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "edit") {
    $query = "UPDATE `kategori` SET `nm_ktgr`='$nm_ktgr' WHERE `id_ktgr`='$id_ktgr';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.kategori.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "del") {
    $query = "DELETE FROM `kategori` WHERE `id_ktgr`='$id_ktgr';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.kategori.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Kategori - APLIKASI PEMESANAN E-MENU</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>
        <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">
        <link href="Assets/Css/business-casual.css" rel="stylesheet">
        <style>
            .brand{
                font-family: serif;
            }

            .address-bar{
                font-family: serif;
            }

            h2{
                font-family: serif;
            }

            footer{
                background-color: transparent;
                font-family: serif;
                font-style: italic;
                font-size: 16px;
            }
        </style>
        <script>
            function showModalEdit(id_ktgr,nm_ktgr) {
                document.getElementById("id_ktgr").readOnly = true; 
                document.getElementById("nm_ktgr").readOnly = false;
                $('#tombol').text('Edit');
                $('#aksi').val('edit');
                $('#id_ktgr').val(id_ktgr);
                $('#nm_ktgr').val(nm_ktgr);
                $('#myModal').modal('show');
            }
            function showModalSave() {
                document.getElementById("id_ktgr").readOnly = false; 
                document.getElementById("nm_ktgr").readOnly = false;           
                $('#tombol').text('Save');
                $('#aksi').val('save');
                $('#id_ktgr').val('');
                $('#nm_ktgr').val('');
                $('#myModal').modal('show');
            }
            function showModalDel(id_ktgr,nm_ktgr) {
                document.getElementById("id_ktgr").readOnly = true; 
                document.getElementById("nm_ktgr").readOnly = true;
               
                $('#tombol').text('Delete');
                $('#aksi').val('del');
                $('#id_ktgr').val(id_ktgr);
                $('#nm_ktgr').val(nm_ktgr);
                $('#myModal').modal('show');
               
            }
        </script>

    </head>
    <body>
    <?php
    $sql = "SELECT * FROM `kategori`;";
    $result = $dao->execute($sql);
    //$list = mysqli_fetch_array($result);
    //print_r($list);
    ?>
        <div class="brand">KEDAI SUSU 53</div>
        <div class="address-bar">Jl.AM Sangaji No.53, Yogyakarta, Cokrodiningratan, Jetis, D.I.Y 55233</div>

        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">Kedai Susu 53</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                           <li>
                            <a href="halaman.admin.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                        </li>
                        <li>
                            <a class=" btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> Master <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="data.meja.php"><span class="glyphicon glyphicon-modal-window"></span> Data Meja</a></li>
                                <li><a href="data.kategori.php"><span class="glyphicon glyphicon-tasks"></span> Data Kategori</a></li>
                                <li><a href="data.menu.php"><span class="glyphicon glyphicon-cutlery"></span> Data Menu</a></li>
                                <li><a href="data.hak.akses.php"><span class="glyphicon glyphicon-link"></span> Hak Akses</a></li>
                                <li><a href="data.admin.php"><span class="glyphicon glyphicon-user"></span> Akun</a></li>
                            </ul>
                        </li>
                        <li>
                           <a href="pesanan.php"><span class="glyphicon glyphicon-shopping-cart"></span> Pesanan</a>
                        </li>
<!--                        <li>
                            <a href="laporan.html"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
                        </li>-->
                        <li>
                            <a class=" btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="change.password.php"><span class="glyphicon glyphicon-edit"></span> Change Password</a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">MASTER
                            <strong>KATEGORI</strong>
                        </h2>
                        <hr>
                    </div>
                    <div class="container">
                        <button type="button" class="btn btn-success btn-sm" onclick="showModalSave();"><span class="glyphicon glyphicon-plus"></span>
                            TAMBAH</button>
                        
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="tjudul">
                                        <th>ID</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($result as $value) {
                                     ?>
                                            <tr></tr>
                                        <td><?php echo $value['id_ktgr']; ?></td>
                                        <td><?php echo $value['nm_ktgr']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" onclick="showModalEdit
                                                ('<?php echo $value['id_ktgr']; ?>',
                                                '<?php echo $value['nm_ktgr']; ?>');"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                                            <button class="btn btn-danger" type="button" onclick="showModalDel
                                                ('<?php echo $value['id_ktgr']; ?>',
                                                '<?php echo $value['nm_ktgr']; ?>');"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                                        </td
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <!--Modal-->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">INPUT DATA KATEGORI</h4>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <div class='content'>
                                    <section>
                                        <form method ="POST" action="data.kategori.php">
                                            <input class="form-control" name="id_ktgr" id="id_ktgr" type="hidden">
                                            <div class="form-group">
                                                <input type="hidden" id="aksi" name="aksi">
                                                <label for="nm_ktgr">Nama Kategori</label>
                                                <input class="form-control" name ="nm_ktgr" id="nm_ktgr" type="text" size="40" placeholder="Masukkan Data" required=""/>
                                            </div>
                                          <button type="submit" id="tombol" class="btn btn-success"><h7 id="tombol"></h7></button>
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!--Modal-->

                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <p>Copyright &copy; Aplikasi Pemesanan E-Menu 2019</p>
                            </div>
                        </div>
                    </div>
                </footer>

               
        </body>
        <script src="Assets/Js/jquery.js"></script>
        <script src="Assets/Js/bootstrap.min.js"></script>
</html>

 

