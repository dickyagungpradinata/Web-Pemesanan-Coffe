<?php
ini_set('display_errors', 'off');
session_start();
include_once 'config/dao.php';
include_once 'config/dbconfig.php';

//$list = mysqli_fetch_array($result);
//print_r($list);
//
//    $id = "SELECT COUNT(id_plgn) AS id FROM pelanggan";
//    $hasil = mysqli_query($koneksi, $id);
//    $a = mysqli_fetch_array($hasil);
//    $hasilid = $a['id']+1;
//    
//    $idp = "SELECT COUNT(id_pmsann) AS idp FROM pemesanan";
//    $hasilp = mysqli_query($koneksi, $idp);
//    $p = mysqli_fetch_array($hasilp);
//    $hasilidp = $p['idp']+1;
//    $tanggal = date('Y/m/d');
//    $idpemesanan = 'PSN-KS'.$tanggal.'-'.$hasilidp;
$id = $_GET['id'];

    $update = "UPDATE meja SET stts_meja='Tersedia' WHERE id_meja=(SELECT id_meja FROM pemesanan WHERE id_pmsann='$id')";
    $up = mysqli_query($koneksi,$update);
$dao = new Dao();
$sql = "SELECT * FROM `meja`;";
$result = $dao->execute($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Daftar Meja - APLIKASI PEMESANAN E-MENU</title>
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

            .address-bar{
                font-family: sans-serif;
            }

            h2{
                font-family: sans-serif;
            }

            h4{
                text-align: center;
                color: gray;
                font-family: sans-serif;
            }

            h3,p{
                text-align: center;

            }

            .caption img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                height: auto;
            }

            .meja{
                background-color: #c0a16b; 
                border: 2px solid #555555;
                border-radius: 8px;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                -webkit-transition-duration: 0.4s;
                transition-duration: 0.4s;
            }

            .meja:hover {
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
                background-color: green;
                color: black;                
            }

            footer{
                background-color: transparent;
                font-family: serif;
                font-style: italic;
                font-size: 16px;
            }

            .center{
                width: 150px;
                margin: 40px auto;

            }

            .thumbnail{
                border-radius: 12px;
                background-color: gray
            }
        </style>
    </head>
    <body>

        <div class="brand">KEDAI SUSU 53</div>
        <div class="address-bar">Jl.AM Sangaji No.53, Yogyakarta, Cokrodiningratan, Jetis, D.I.Y 55233</div>
        <div class="container-fluid">
            <div class="box">
                <div class="col-md-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Daftar Pilihan Meja</strong>
                    </h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="row">
                                <?php
                                foreach ($result as $value) {
                                    ?>
                                    <div class="col-md-2">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <img src="Assets/Img/icontabel.png" alt="Snow">
                                                <?php  
                                                if($value['stts_meja'] == "Tersedia" ) {
                                                    ?>
                                                <h3><a href="ganti.pesanan.php?meja=<?php echo $value['id_meja'];?>&id=<?php echo $id;?>"><button class="meja"><?php echo $value['no_meja']; ?></button></a></h3>
                                                <?php
                                                }else {
                                                    ?>
                                                <h3><button style="background-color: red;" disabled onclick="tampilmodal(<?php echo $value['no_meja']; ?>);"  class="meja"><?php echo $value['no_meja']; ?></button></h3>
                                        
                                                <?php
                                                }
                                                ?>
                                
                                                <p><?php echo $value['stts_meja']; ?></p>
                                            </div>
                                        </div>  
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nomeja" class="col-form-label">No Meja:</label>
                                        <input readonly class="form-control" name="nomeja" id="nomeja"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="namapelanggant" class="col-form-label">Nama Pelanggan</label>
                                        <input class="form-control" name="namapelanggan" id="namapelanggant"></input>
                                    </div>
                                    
                           
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name="simpanpelanggan" class="btn btn-primary">Save </button>
                                </div>
                                </form>
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
                        function tampilmodal(nomeja) {
                            document.getElementById('nomeja').value=nomeja;
                            $("#exampleModal").modal('show');
                        }
                    </script>

                    <script src="Assets/Js/jquery.js"></script>
                    <script src="Assets/Js/bootstrap.min.js"></script>

                    </body>
                    </html>