<?php
ini_set('display_errors', 'off');
session_start();
include_once 'config/dao.php';
$dao = new Dao();
$sql = "SELECT * FROM menu WHERE id_ktgr = '3' ";
$result = $dao->execute($sql);
//$list = mysqli_fetch_array($result);
//print_r($list);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Juice - APLIKASI PEMESANAN E-MENU</title>
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
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Juice - APLIKASI PEMESANAN E-MENU</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>
        <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">
        <link href="Assets/Css/business-casual.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="Assets/Css/sweetalert.css">
        <script src="Assets/Js/jquery.js"></script>
        <script src="Assets/SweetAlert/sweetalert.min.js"></script>
       
        <style>
            .brand{
                font-family: sans-serif;
            }

            .address-bar{
                font-family: sans-serif;
            }
            .ples{
                padding: 8px;
                padding-left: 13px;
                background-color: green;
                color: white;
                text-decoration: none;

            }
            .ples:hover{
                color:black;
                cursor: pointer;
            }

            h2{
                font-family: sans-serif;
            }

            h4{
                text-align: center;
                color: gray;
                font-family: sans-serif;

            }

            .kurang a{
                color:white;
                text-decoration: none;
            }

            .kurang a:hover{
                color: red;
            }

            .bayar{
                margin-top: 10px;
                width: 100%;

            }
            .list-group{
                margin: 1px auto;

            }
            footer{
                background-color: transparent;
                font-family: sans-serif;
                font-style: italic;
                font-size: 16px;
            }

            .center{
                width: 150px;
                margin: 40px auto;

            }

            .thumbnail,img{
                border-radius: 12px
            }

            h3,p{
                text-align: center;
                font-family: sans-serif;
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

                    <a class="navbar-brand" href="index.html">Kedai Susu 53</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>    
                            <a href="<?php echo 'home.php?id=' . $id ?>"><span class="glyphicon glyphicon-home"></span> Home</a>
                        </li>
                        <li>
                            <a href="<?php echo 'coffe.php?id=' . $id ?>"><span class="glyphicon glyphicon-leaf"></span> Coffe</a>
                        </li>
                        <li>
                            <a href="<?php echo 'juice.php?id=' . $id ?>"><span class="glyphicon glyphicon-apple"></span> Juice</a>
                        </li>
                        <li>
                            <a href="<?php echo 'milk.php?id=' . $id ?>"><span class="glyphicon glyphicon-baby-formula"></span> Milk</a>
                        </li>
                        <li>
                            <a href="<?php echo 'food.php?id=' . $id ?>"><span class="glyphicon glyphicon-cutlery"></span> Food</a>
                        </li>
                        <li>
                            <a href="<?php echo 'cakes.php?id=' . $id ?>"><span class="glyphicon glyphicon-king"></span> Cakes</a>
                        </li>
                    </ul>
                </div>               
            </div>
        </nav>
        <div class="container-fluid">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Daftar Menu</strong>
                    </h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-7">

                        <h4>JUICE</h4>
                        <br>
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                foreach ($result as $value) {
                                    ?>
                                    <div class="col-md-4">
                                        <div class="thumbnail">
                                            <img src=" <?php echo 'gambar/' . $value['gambar']; ?> " alt="...">
                                            <div class="caption">
                                                <h3><?php echo $value['nm_menu']; ?></h3>
                                                <p>Harga : Rp.<?php echo $value['hrg_menu']; ?></p>
                                                <p>Status : <?php echo $value['stock']; ?></p>
                                                <?php
                                                $idmenu = $value['id_menu'];
                                                $harga = $value['hrg_menu'];
                                                ?>
                                                <p>
                                                <!--membuat fungsi menambahkan menu pada detail pemesanan-->
                                                <div>
                                                    <a href="proses.coffe.php?id_menu=<?php echo $value['id_menu'] . '&id=' . $id . '&harga=' . $harga; ?>" class="btn btn-success btn-block"><span class="glyphicon glyphicon-shopping-cart"></span>
                                                        Pesan                   
                                                    </a>                                             
                                                </div>
                                                </p>
                                            </div>
                                        </div>  
                                    </div>
    <?php
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h4>
                            DETAIL PEMESANAN
                        </h4><br>
                        
                        <div class="col-md-12">
                            
<!--kondisi saat tidak ada pesanan atau belum menambahkan menu-->
<?php
$deteksesion = $_SESSION['tambah'];
if ($deteksesion == "") {
    echo 'Belum Ada Pemesanan';
} elseif ($deteksesion != "") {
    ?>
                                <!--membuat detail pembayaran jumlah total menu--> 
                                <?php
                                $totalsemua = 0;
                                foreach ($_SESSION['tambah'] as $id_menus => $jumlah):
                                    ?>  
                                    <?php
                                    $db = mysqli_connect('localhost', 'root', '', 'projectkp');
                                    $ambil = mysqli_query($db, "SELECT * FROM menu WHERE id_menu = '$id_menus'");
                                    $pecah = $ambil->fetch_assoc();
                                    $hitung = $pecah['hrg_menu'] * $jumlah;
                                    $totalsemua += $hitung;
                                    ?>
                                <!--membuat fungsi pengurangan menu yang telah dipesan-->
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge kurang"><a href="prosesminus.coffe.php?id_menu=<?php echo $id_menus . '&id=' . $id; ?>">X</a></span>
                                            <span class="badge">Rp. <?php echo number_format($hitung); ?></span>
                                            <span class="badge"><?php echo $jumlah; ?></span>
                                            <span class="badge">Rp. <?php echo number_format($pecah['hrg_menu']); ?></span>
                                     <?php echo $pecah['nm_menu']; ?>
                                        </li>
                                    </ul>
                                <?php endforeach; ?>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge">Rp. <?php echo number_format($totalsemua); ?></span>
                                        Total Pembayaran
                                    </li>
                                </ul>
                                <?php } ?>
                            <div class="col-md-4 bayar" >                  
                                <a type="button" onclick="sweet();" class="btn btn-success btn-block"><span class="glyphicon glyphicon-check"></span> Selesai</a> 
                                <a href="ganti.meja.php?id=<?php echo $id ?>" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-retweet"></span>
                                                        Ganti Meja                   
                                                    </a>         
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
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
        <script>
        function sweet(){
          swal({
              title:"Berhasil Memesan",
              text:"Pesanan Anda Sedang Diproses",
              type:"succes",
              confirmButtonText:"ok"
              
          }
         
        );
        window.location='daftar.meja.php';
        }
        
            </script>
         <script>
        function move(){
          swal({
              title:"Mengubah Meja",
              text:"Meja Anda Sedang Diproses",
              type:"succes",
              confirmButtonText:"ok"
              
          }
         
        );
        window.location='daftar.meja.php';
        }
        
            </script>
            
        <script src="Assets/Js/bootstrap.min.js"></script>

    </body>
</html>