<?php
include_once 'config/dao.php';
$dao = new Dao();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Pemesanan - APLIKASI PEMESANAN E-MENU</title>
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
            
            footer{
                background-color: transparent;
                font-family: sans-serif;
                font-style: italic;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <?php
         $sql = "SELECT id_pmsann, tgl_pmsann, pelanggan.nm_plgn AS namapelanggan, meja.no_meja AS nomeja, kasir.nm_admin AS namaadmin  FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_plgn = pelanggan.id_plgn INNER JOIN meja ON meja.id_meja = pemesanan.id_meja INNER JOIN kasir ON kasir.id_admin = pemesanan.id_admin ORDER BY pemesanan.id_pmsann DESC;";
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
                            <a href="halaman.petugas.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                        </li>
                         <li>
                            <a href="meja.php"><span class="glyphicon glyphicon-check"></span> Meja</a>
                        </li>
                        <li>
                            <a href="pemesanan.php"><span class="glyphicon glyphicon-shopping-cart"></span> Pesanan</a>
                        </li>
                        <li>
                            <a class=" btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="password.php"><span class="glyphicon glyphicon-edit"></span> Change Password</a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>

        </nav>
       <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong>PEMESANAN</strong>
                        </h2>
                        <hr>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-hover">                               
                            <thead>
                                <tr>   
                                    <th>No.Pemesanan</th>
                                    <th>Tgl Pemesanan</th>
                                    <th>No Meja</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Admin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $value) { ?>
                                    <tr>
                                        <td><?php echo $value['id_pmsann']; ?></td>
                                        <td><?php echo $value['tgl_pmsann']; ?></td>
                                        <td><?php echo $value['nomeja']; ?></td>
                                        <td><?php echo $value['namapelanggan']; ?></td>
                                        <td><?php echo $value['namaadmin']; ?></td>
                                        <td> 
                                            <a class="btn btn-primary" href="<?php echo 'cetak.php?id=' . $value['id_pmsann']; ?>" target="blank"> Cetak </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
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
