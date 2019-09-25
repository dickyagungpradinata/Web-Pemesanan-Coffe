<?php
ini_set('display_errors', 'off');
error_reporting(E_ALL);
include_once 'config/dao.php';
$dao = new Dao();
$aksi = $_POST['aksi'];
$no_meja = $_POST['no_meja'];
$stts_meja = $_POST['stts_meja'];
if ($aksi == "save") {

    $query = "INSERT INTO meja(no_meja, stts_meja) VALUES('$no_meja','$stts_meja')";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.meja.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "edit") {
    $query = "UPDATE `meja` SET `stts_meja`='$stts_meja' WHERE `no_meja`='$no_meja';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.meja.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
} else if ($aksi == "del") {
    $query = "DELETE FROM `meja` WHERE `no_meja`='$no_meja';";
    $hasil = $dao->execute($query);
    if ($query) {
        header("location:data.meja.php");
    } else {
        echo 'Data Gagal Disimpan';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Data Meja - APLIKASI PEMESANAN E-MENU</title>
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

            function showModalEdit(nomeja, stts) {
                document.getElementById("nomeja").readOnly = true;
                document.getElementById("stts").readOnly = false;
                
                $('#tombol').text('Edit');
                $('#aksi').val('edit');
                $('#nomeja').val(nomeja);
                $('#stts').val(stts);
                $('#myModal').modal('show');
                $('#stts').show('fast');
                $('#sttsmeja').show('fast');
            }

            function showModalSave() {
                document.getElementById("nomeja").readOnly = false;
                document.getElementById("stts").readOnly = false;

                $('#tombol').text('Save');
                $('#aksi').val('save');
                $('#nomeja').val('');
                //$('#stts').val(0);
                $('#myModal').modal('show');
                $('#stts').show('fast');
                $('#sttsmeja').show('fast');
            }
            
            function showModalDel(nomeja, stts) {
                document.getElementById("nomeja").readOnly = true;
                document.getElementById("stts").readOnly = true;
                
                $('#tombol').text('Delete');
                $('#aksi').val('del');
                $('#nomeja').val(nomeja);
                $('#stts').val(stts);
                $('#myModal').modal('show');
                $('#stts').hide('fast');
                $('#sttsmeja').hide('fast');
            }
        </script>
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM `meja`;";
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
                            <strong>DATA MEJA</strong>
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
                                            <th>Nomer Meja</th>
                                            <th>Status Meja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($result as $value) {
                                            ?>
                                            <tr></tr>
                                        <td><?php echo $value['id_meja']; ?></td>
                                        <td><?php echo $value['no_meja']; ?></td>
                                        <td><?php echo $value['stts_meja']; ?></td>
                                        <td>
                                            <button class="btn btn-warning" type="button" onclick="showModalEdit
                                                                ('<?php echo $value['no_meja']; ?>',
                                                                '<?php echo $value['stts_meja']; ?>');"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                                            <button class="btn btn-danger" type="button" onclick="showModalDel
                                                              ('<?php echo $value['no_meja']; ?>',
                                                              '<?php echo $value['stts_meja']; ?>');"><span class="glyphicon glyphicon-remove"></span> Delete</button>
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
            </div>
            
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">INPUT DATA MEJA</h4>
                        </div>
                        <div class="modal-body">
                            <div class='content'>
                                <section>
                                    <form action="data.meja.php" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" id="aksi" name="aksi">
                                            <label for="no_meja">No Meja </label>
                                            <input class="form-control" name ="no_meja" id="nomeja" type="number" size="50" placeholder="Masukkan Data" required=""/>                                           
                                        </div>  
                                        <div class="form-group">
                                            <label id="sttsmeja">Status Meja </label>
                                            <select required class="form-control" name ="stts_meja" id="stts" required="">
                                                <option value="">--Masukkan Pilihan--</option>
                                                <option value="Tersedia">Tersedia</option>
                                                <option value="Tidak Tersedia">Tidak Tersedia</option>                            
                                            </select>
                                        </div>
                                        <button type="submit" id="tombol" class="btn btn-success"></span><h7 id="tombol"></h7></button>
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
                             <p>Copyright Mr.Dickies &copy; 2019 Aplikasi Pemesanan E-Menu Kedai Susu 53</p>
                        </div>
                    </div>
                </div>
            </footer>


            <script src="Assets/Js/jquery-3.3.1.js"></script>
            <script src="Assets/Js/bootstrap.min.js"></script>
           
    </body>
 
</html>