<?php

include_once 'config/dao.php';
$dao = new Dao();
if(isset($_POST['aksi'])){
        ?>
<script>
    alert(<?php echo $_POST['aksi'] ?>);
    </script>
    <?php
    $aksi = $_POST['aksi'];
    $id_menu = $_POST['id_menu'];
    $nm_menu = $_POST['nm_menu'];
    $hrg_menu = $_POST['hrg_menu'];
    $stock = $_POST['stock'];
    $kategori = $_POST['id_ktgr'];
    $namaFile = $_FILES['gambar']['name'];
    $namaSementara = $_FILES['gambar']['tmp_name'];
    $dirUpload = "gambar/";
    
    if ($aksi == "save") {
    
    $query = "INSERT INTO menu(nm_menu, hrg_menu, stock, gambar, id_ktgr ) VALUES('$nm_menu','$hrg_menu','$stock','$namaFile','$kategori')";
    $hasil = $dao->execute($query);
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
    if ($hasil) {
        header("location:data.menu.php");
    } else {
        echo '<script>alert("data gagal disimpan)</script>';
    }
} else if ($aksi == "edit") {
    $query = "UPDATE `menu` SET `nm_menu`='$nm_menu',`hrg_menu`='$hrg_menu',`stock`='$stock',`gambar`='$gambar' WHERE `id_menu`='$id_menu';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.menu.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "del") {
    $query = "DELETE FROM `menu` WHERE `id_menu`='$id_menu';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.menu.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
}
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Menu - APLIKASI PEMESANAN E-MENU</title>
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

            .brand-name{
                font-family: serif;
                font-size: 52px;
            }

            .brand-before{
                font-family: serif;
            }

            h2{
                font-family: serif;
                font-size: 52px;
            }

            .address-bar{
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

            function showModalEdit(idmenu, nmmenu, hrgmenu, stock, gambar ) {
                document.getElementById("idmenu").readOnly = true;
                document.getElementById("nmmenu").readOnly = false;
                document.getElementById("hrgmenu").readOnly = false;
                document.getElementById("stock").readOnly = false;
                document.getElementById("gambar").readOnly = false;
                
                $('#tombol').text('Edit');
                $('#aksi').val('edit');
                $('#idmenu').val(idmenu);
                $('#nmmenu').val(nmmenu);
                $('#hrgmenu').val(hrgmenu);
                $('#stock').val(stock);
//                $('#gambar').val(gambar);
//                $('#nmgambar').val(gambar);    
                $('#myModal').modal('show');
                
            }

            function showModalSave() {
                document.getElementById("idmenu").readOnly = false;
                document.getElementById("nmmenu").readOnly = false;
                document.getElementById("hrgmenu").readOnly = false;
                document.getElementById("stock").readOnly = false;
                document.getElementById("gambar").readOnly = false;

                $('#tombol').text('Save');
                $('#aksi').val('save');
                $('#idmenu').val('');
                $('#nmmenu').val('');
                $('#hrgmenu').val('');
//                $('#stock').val(0);
                $('#gambar').val('');
                $('#myModal').modal('show');
            }
            
            function showModalDel(idmenu, nmmenu, hrgmenu, stock, gambar ) {
                document.getElementById("idmenu").readOnly = true;
                document.getElementById("nmmenu").readOnly = true;
                document.getElementById("hrgmenu").readOnly = true;
                document.getElementById("stock").readOnly = true;
                document.getElementById("gambar").readOnly = true;
                $('#tombol').text('Delete');
                $('#aksi').val('del');
                $('#idmenu').val(idmenu);
                $('#nmmenu').val(nmmenu);
                $('#hrgmenu').val(hrgmenu);
                $('#stock').val(stock);
                $('#gambar').val(gambar);
                $('#myModal').modal('show');
            }
        </script>
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM `menu`;";
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

                    <a class="navbar-brand" href="index.html">Business Casual</a>
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
                            <strong>DATA MENU</strong>
                        </h2>
                        <hr>
                    </div>
                    <div class="container">

                        <button type="button" class="btn btn-success btn-sm" onclick="showModalSave();"><span class="glyphicon glyphicon-plus"></span>
                            TAMBAH</button>
                        
                        <br><br>
                        <div class="container">
                            <div class="wrap">
                            <div class="table-responsive">
                                <table class="table table-hover">                               
                                    <thead>
                                        <tr class="tjudul">          
                                             <th>ID</th>
                                            <th>Nama Menu</th>
                                            <th>Harga Menu</th>
                                            <th>Stock Menu</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($result as $value) {
                                            ?>
                                            <tr></tr>
                                        <td><?php echo $value['id_menu']; ?></td>
                                        <td><?php echo $value['nm_menu']; ?></td>
                                        <td><?php echo $value['hrg_menu']; ?></td>
                                        <td><?php echo $value['stock']; ?></td>
                                        <td><?php echo $value['gambar']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" onclick="showModalEdit
                                                                ('<?php echo $value['id_menu']; ?>',
                                                                        '<?php echo $value['nm_menu']; ?>',
                                                                        '<?php echo $value['hrg_menu']; ?>',
                                                                        '<?php echo $value['stock']; ?>',
                                                                        '<?php echo $value['gambar']; ?>');">
                                                                        <span class="glyphicon glyphicon-pencil"></span> Edit</button>
                                            <button class="btn btn-danger" type="button" onclick="showModalDel
                                                                ('<?php echo $value['id_menu']; ?>',
                                                                        '<?php echo $value['nm_menu']; ?>',
                                                                        '<?php echo $value['hrg_menu']; ?>',
                                                                        '<?php echo $value['stock']; ?>',
                                                                        '<?php echo $value['gambar']; ?>');"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                                        </td>
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
                </div>
            </div>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">INPUT DATA MENU</h4>
                        </div>
                        <div class="modal-body">
                            <div class='content'>
                                <section>
                                    <form action="data.menu.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input class="form" name="id_menu" id="idmenu" type="hidden">
                                            <div>
                                            <input type="hidden" id="aksi" name="aksi">
                                            <label for="nm_menu">Nama Menu</label>
                                            <input  class="form-control" name ="nm_menu" id="nmmenu" type="text" size="50" placeholder="Masukkan Data" required="">
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <label for="hrg_menu">Harga Menu</label>
                                                <input  class="form-control" name ="hrg_menu" id="hrgmenu" type="number" size="50" placeholder="Masukkan Data" required=""/>
                                            </div>
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <select class="form-control" name ="stock" id="stock" required="">
                                                    <option selected="yes" >--Masukkan Pilihan--</option>
                                                    <option value="Tersedia">Tersedia</option>
                                                    <option value="Tidak Tersedia">Tidak Tersedia</option>                            
                                                </select>
                                            </div>
                                            <div>
                                                <label for="gambar">Gambar</label>
                                                <input  id="gambar" name="gambar" type="file">
<!--                                                <input id="nmgambar" name="nmgambar" type="text">-->
                                            </div>
                                            <div>
                                                <label class="control-label" for="id_akses">Kategori</label>
                                                <select name="id_ktgr" class="form-control" >
                                                    <option value="" selected="selected">--Pilih Kategori--</option>
                                                    <?php
                                                    $konek = mysqli_connect('localhost', 'root', '', 'projectkp');
                                                    $query = mysqli_query($konek, "SELECT * FROM kategori");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        echo "<option value='$data[id_ktgr]'>$data[nm_ktgr]</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
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
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p>Copyright &copy; Aplikasi Pemesanan E-Menu 2019</p>
                        </div>
                    </div>
                </div>
            </footer>

            <script src="Assets/Js/jquery.js"></script>
            <script src="Assets/Js/bootstrap.min.js"></script>

    </body> 
</html>