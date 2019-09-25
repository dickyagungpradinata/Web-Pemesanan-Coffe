<<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin - Aplikasi Pemesanan E-Menu</title>
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

        </style>
    </head>
    <body>
        <?php
        session_start();

        // cek apakah yang mengakses halaman ini sudah login
        if ($_SESSION['id_akses'] == "") {
            header("location:index.php?pesan=gagal");
        }
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
                </div>
            </div>

        </nav>

        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12 text-center">
                        <div id="carousel-example-generic" class="carousel slide">
                            <!-- Indicators -->
                            <ol class="carousel-indicators hidden-xs">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="img-responsive img-full" src="Assets/Img/coffe.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="img-responsive img-full" src="Assets/Img/coffe2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="img-responsive img-full" src="Assets/Img/coffe4.jpg" alt="">
                                </div>
                            </div>

                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="icon-prev"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                        <h2 class="brand-before">
                            <small>Welcome to</small>
                        </h2>
                        <h1 class="brand-name">Kedai Susu 53</h1>
                        <hr class="tagline-divider">
                        <h2>
                            <small>
                                <strong>"Happy And Healthy In One Time"</strong>
                            </small>
                        </h2>
                    </div>
                </div>
            </div>


            <script src="Assets/Js/jquery.js"></script>


            <script src="Assets/Js/bootstrap.min.js"></script>


            <script>
                $('.carousel').carousel({
                    interval: 5000 //changes the speed
                })
            </script>
    </body>
</html>


