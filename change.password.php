<?php
ini_set('display_errors', 'off');
session_start();
include_once 'config/dbconfig.php';
$id_admin   = $_POST['id_admin'];
$password   = $_POST['password'];
//mengatasi error notice dan warning
//error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$query = "select * from kasir where id_admin = '$_SESSION[id_admin]'";
$hasil = mysqli_query($koneksi, $query);
$a = mysqli_fetch_assoc($hasil);

//koneksi ke database
$conn = new mysqli("localhost", "root", "", "projectkp");
$query2="UPDATE kasir SET password='$password' where id_admin='$_SESSION[id_admin]'";
$simpan2 = mysqli_query($koneksi, $query2);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Change Password - APLIKASI PEMESANAN E-MENU</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>
        <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">
        <link href="Assets/Css/business-casual.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="Assets/Css/sweetalert.css">
        <script src="Assets/Js/jquery-3.3.1.js"></script>
         <script src="Assets/SweetAlert/sweetalert.min.js"></script>


        <style>
            .brand{
                font-family: sans-serif;
            }

            .brand-name{
                font-family: sans-serif;
                font-size: 52px;
            }

            .brand-before{
                font-family: sans-serif;
            }

            h2{
                font-family: sans-serif;
                font-size: 52px;
            }

            .address-bar{
                font-family: sans-serif;
            }

            footer{
                background-color: transparent;
                font-family: sans-serif;
                font-style: italic;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
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
                        <h2 class="intro-text text-center">
                            <strong>CHANGE PASSWORD</strong>
                        </h2>
                        <hr>
                    </div>
                    <div class="container">
                        <form action="change.password.php" method="post">
<!--                            <div class="form-group">
                                <label for="password">Password Lama:</label>
                                <input type="text" class="form-control" id="password_lama" value="<?= $a['password']?>" name="email" required="">
                            </div>-->
                            <div class="form-group">
                                <label for="password">Password Baru:</label>
                                <input type="text" class="form-control" id="password_baru" placeholder="Password" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Konfirmasi Password:</label>
                                <input type="text" class="form-control" id="konfirmasi_password" placeholder="Konfirmasi Password" name="password" required="">
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="sweet();"><span class="glyphicon glyphicon-save-file"></span> Save</button>
                                
                        </form>
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
        
        <script src="Assets/Js/bootstrap.min.js"></script>
        <script>
        function sweet(){
         swal({
  title: "Good",
  text: "You clicked the button!",
  icon: "success"
});
        }
        </script>
        
    </body>

</html>