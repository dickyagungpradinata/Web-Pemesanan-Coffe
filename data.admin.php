<?php
ini_set('display_errors', 'off');
error_reporting(E_ALL);
include_once 'config/dao.php';
$dao = new Dao();
$aksi = $_POST['aksi'];
$id_admin = $_POST['id_admin'];
$username = $_POST['username'];
$password = $_POST['password'];
$nm_admin = $_POST['nm_admin'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$id_akses = $_POST['id_akses'];
if ($aksi == "save") {

    $query = "INSERT INTO kasir(username,password,nm_admin,alamat,email,no_hp,id_akses) VALUES('$username','$password','$nm_admin','$alamat','$email','$no_hp','$id_akses')";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.admin.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "edit") {
    $query = "UPDATE `kasir` SET `username`='$username',`password`='$password',`nm_admin`='$nm_admin',`alamat`='$alamat',`email`='$email',`no_hp`='$no_hp' WHERE `id_admin`='$id_admin';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.admin.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "del") {
    $query = "DELETE FROM kasir WHERE id_admin ='$id_admin';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.admin.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
}
?>

<html lang="en">
    <head>
        <title>Data Admin - APLIKASI PEMESANAN E-MENU</title>
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
            function showModalEdit(id_admin, username, password, nm_admin, alamat, email, no_hp) {
                document.getElementById("id_admin").readOnly = true;
                document.getElementById("username").readOnly = false;
                document.getElementById("password").readOnly = false;
                document.getElementById("nm_admin").readOnly = false;
                document.getElementById("alamat").readOnly = false;
                document.getElementById("email").readOnly = false;
                document.getElementById("no_hp").readOnly = false;
                
                $('#tombol').text('Edit');
                $('#aksi').val('edit');
                $('#id_admin').val(id_admin);
                $('#username').val(username);
                $('#password').val(password);
                $('#nm_admin').val(nm_admin);
                $('#alamat').val(alamat);
                $('#email').val(email);
                $('#no_hp').val(no_hp);
                $('#myModalEdit').modal('show');
                $('#password').show('fast');
                $('#nm_admin').show('fast');
                $('#alamat').show('fast');
                $('#email').show('fast');
                $('#no_hp').show('fast');
                $('#akses').show('fast');
                $('#idakses').show('fast');
                $('#pass').show('fast');
                $('#nmadmin').show('fast');
                $('#almt').show('fast');
                $('#mail').show('fast');
                $('#nohp').show('fast');
            }
            function showModalSave() {
                document.getElementById("id_admin").readOnly = false;
                document.getElementById("username").readOnly = false;
                document.getElementById("password").readOnly = false;
                document.getElementById("nm_admin").readOnly = false;
                document.getElementById("alamat").readOnly = false;
                document.getElementById("email").readOnly = false;
                document.getElementById("no_hp").readOnly = false;
            
                $('#tombol').text('Save');
                $('#aksi').val('save');
                $('#id_admin').val('');
                $('#username').val('');
                $('#password').val('');
                $('#nm_admin').val('');
                $('#alamat').val('');
                $('#email').val('');
                $('#no_hp').val('');
                $('#myModalEdit').modal('show');
                $('#password').show('fast');
                $('#nm_admin').show('fast');
                $('#alamat').show('fast');
                $('#email').show('fast');
                $('#no_hp').show('fast');
                $('#akses').show('fast');
                $('#idakses').show('fast');
                $('#pass').show('fast');
                $('#nmadmin').show('fast');
                $('#almt').show('fast');
                $('#mail').show('fast');
                $('#nohp').show('fast');
            }
            function showModalDel(id_admin, username, password, nm_admin, alamat, email, no_hp) {
                document.getElementById("id_admin").readOnly = true;
                document.getElementById("username").readOnly = true;
                document.getElementById("password").readOnly = true;
                document.getElementById("nm_admin").readOnly = true;
                document.getElementById("alamat").readOnly = true;
                document.getElementById("email").readOnly = true;
                document.getElementById("no_hp").readOnly = true;
                
                $('#tombol').text('Delete');
                $('#aksi').val('del');
                $('#id_admin').val(id_admin);
                $('#username').val(username);
                $('#password').val(password);
                $('#nm_admin').val(nm_admin);
                $('#alamat').val(alamat);
                $('#email').val(email);
                $('#no_hp').val(no_hp);
                $('#myModalEdit').modal('show');
                $('#password').hide('fast');
                $('#nm_admin').hide('fast');
                $('#alamat').hide('fast');
                $('#email').hide('fast');
                $('#no_hp').hide('fast');
                $('#akses').hide('fast');
                $('#idakses').hide('fast');
                $('#pass').hide('fast');
                $('#nmadmin').hide('fast');
                $('#almt').hide('fast');
                $('#mail').hide('fast');
                $('#nohp').hide('fast');
            }
        </script>
        <style>
            .aksi{
                color: white;
            }
        </style>
    </head>
    <body>
    <?php
    $sql = "SELECT * FROM `kasir`;";
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
                            <strong>DATA ADMIN</strong>
                        </h2>
                        <hr>
                    </div>
                    <div class="container">
                        <button type="button" class="btn btn-success btn-sm" onclick="showModalSave();"><span class="glyphicon glyphicon-plus"></span> 
                            TAMBAH</button>
                        <br><br>
                        <div class="container">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="tjudul">
                                            <th>ID</th>
                                            <th>Username</th>
<!--                                            <th>Password</th>-->
                                            <th>Nama Admin</th>
                                            <th>Alamat</th>
                                            <th>E-mail</th>
                                            <th>No.Handphone</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($result as $value) {
                                     ?>
                                            <tr></tr>
                                        <td><?php echo $value['id_admin']; ?></td>
                                        <td><?php echo $value['username']; ?></td>
<!--                                        <td><?php echo $value['password']; ?></td>-->
                                        <td><?php echo $value['nm_admin']; ?></td>
                                        <td><?php echo $value['alamat']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['no_hp']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" onclick="showModalEdit
                                                ('<?php echo $value['id_admin']; ?>',
                                                '<?php echo $value['username']; ?>',
                                                '<?php echo $value['password']; ?>',
                                                '<?php echo $value['nm_admin']; ?>',
                                                '<?php echo $value['alamat']; ?>',
                                                '<?php echo $value['email']; ?>',
                                                '<?php echo $value['no_hp']; ?>');"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                                            <button class="btn btn-danger" type="button" onclick="showModalDel
                                                ('<?php echo $value['id_admin']; ?>',
                                                '<?php echo $value['username']; ?>',
                                                '<?php echo $value['password']; ?>',
                                                '<?php echo $value['nm_admin']; ?>',
                                                '<?php echo $value['alamat']; ?>',
                                                '<?php echo $value['email']; ?>',
                                                '<?php echo $value['no_hp']; ?>');"><span class="glyphicon glyphicon-remove"></span> Delete</button>
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
                <!--Modal-->
                <div class="modal fade" id="myModalEdit" role="dialog">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">INPUT DATA ADMIN</h4>
                            </div>
                            <div class="modal-body">
                                <div class='content'>
                                    <section>
                                        <form method ="POST" action="data.admin.php">
                                            
                                            <input class="form-control" name="id_admin" id="id_admin" type="hidden">
                                            <div class="form-group">
                                                <input type="hidden" id="aksi" name="aksi">
                                                <label for="username">Username</label>
                                                <input class="form-control" name ="username" id="username" type="text" size="50" placeholder="Masukkan Data" required=""/>
                                            </div>
                                            <div>
                                                <label for="password"id="pass">Password</label>
                                                <input class="form-control"  name ="password" id="password" type="text" size="50" placeholder="Masukkan Data"required=""/>
                                            </div>
                                            <div>
                                                <label for="nm_admin" id="nmadmin">Nama Admin</label>
                                                <input class="form-control"  name ="nm_admin" id="nm_admin" type="text" size="50" placeholder="Masukkan Data" required=""/>
                                            </div>
                                            <div>
                                                <label for="alamat" id="almt">Alamat</label>
                                                <input class="form-control"  name ="alamat" id="alamat" type="text" size="50" placeholder="Masukkan Data" required=""/>
                                            </div>
                                            <div>
                                                <label for="email" id="mail">E-mail</label>
                                                <input class="form-control" name ="email" id="email" type="text" size="50" placeholder="Masukkan Data" required=""/>
                                            </div>
                                            <div>
                                                <label for="no_hp" id="nohp">No.Handphone</label>
                                                <input class="form-control" name ="no_hp" id="no_hp" type="number" size="50" placeholder="Masukkan Data" required=""/>
                                            </div>
                                            <div>
                                                <label class="control-label" for="id_akses" id="akses">Hak Akses</label>
                                                <select name="id_akses" class="form-control" id="idakses">
                                                    <option value="" selected="selected">--Pilih Hak Akses--</option>
                                                    <?php
                                                    $konek = mysqli_connect('localhost', 'root', '', 'projectkp');
                                                    $query = mysqli_query($konek, "SELECT * FROM hak_akses");
                                                    while ($data = mysqli_fetch_array($query)) {
                                                        echo "<option value='" . $data[id_akses] . "'>" . $data[nm_akses] . "</option>";
                                                    }
                                                    ?>                       
                                                </select>
                                            </div>
                                            </div>
                                            <button type="submit" id="tombol" class="btn btn-success"><h7>tombol</h7></button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                              <p>Copyright Mr.Dickies &copy; 2019 Aplikasi Pemesanan E-Menu Kedai Susu 53</p>
                            </div>
                        </div>
                    </div>
            </footer>
                <script src="Assets/Js/jquery.js"></script>
                <script src="Assets/Js/bootstrap.min.js"></script>
        </body>
</html>