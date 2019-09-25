<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = "";
}
include_once 'config/dbconfig.php';
//$id = 'PSN-KS2019/01/23-13';
$query = "select pemesanan.*, pelanggan.*, meja.no_meja, kasir.nm_admin from pemesanan inner join pelanggan on pelanggan.id_plgn = pemesanan.id_plgn inner join meja on meja.id_meja = pemesanan.id_meja inner join kasir on kasir.id_admin = pemesanan.id_admin where id_pmsann = '$id' ";
$hasil = mysqli_query($koneksi, $query);
$a = mysqli_fetch_object($hasil);

$query2 = "select menu.nm_menu, count(menu.nm_menu) as jumlah, detail_pemesanan.harga, detail_pemesanan.harga*count(menu.nm_menu) as total from detail_pemesanan INNER JOIN pemesanan on pemesanan.id_pmsann = detail_pemesanan.id_pmsann INNER JOIN menu on menu.id_menu = detail_pemesanan.id_menu where pemesanan.id_pmsann = '$id' group by menu.nm_menu;";
$hasil2 = mysqli_query($koneksi, $query2);

$query3 = "select count(id_pmsann) as jumlah, SUM(harga) as total from detail_pemesanan where id_pmsann = '$id'";
$hasil3 = mysqli_query($koneksi, $query3);   
$t = mysqli_fetch_object($hasil3);
?>

<!DOCTYPE html>
<html>
<head>
	<title>CETAK KEDAI SUSU 53</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>
        
        
        <style>
            @page { 
                size: 75mm 100mm;
            
            }
            
            h5,th,td{
                font-family: serif;
                font-size: 10px;
            }
        </style>
</head>
<body onload = "window.print()">

	<center>

		    <h5>"KEDAI SUSU 53 YOGYAKAKARTA"</h5>
                    <h5>Jl.AM Sangaji No.53, Yogyakarta, Cokrodiningratan, Jetis, D.I.Y 55233</h5>
                    <h5>NOTA PEMESANAN</h5>
                    <p>------------------------------------</p>
                    <div class="container">      
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>ID</b></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td><b>Keterangan</td>                                
                                </tr>
                                
                                <tr>
                                    <td>No.Pemesanan</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <?php echo $a->id_pmsann ?> </td>
                                </tr>
                                <tr>    
                                    <td>Tanggal</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <?php echo $a->tgl_pmsann ?> </td>
                                </tr>
                                <tr>
                                    <td>Meja</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <?php echo $a->no_meja ?> </td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <?php echo $a->nm_plgn ?> </td>
                                </tr>
                                <tr>
                                    <td>Admin</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> <?php echo $a->nm_admin ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>------------------------------------</p>
                    <div class="container">      
                        <table class="table table-bordered">
                            <tbody>
                                 <tr>
                                    <td><b>Menu</b></td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp;</td>
                                    <td> &nbsp; </td>
                                    <td> &nbsp; </td>
                                    <td> &nbsp; </td>
                                    <td><b>Harga</td>                                
                                </tr>
                                <?php
                                while($a = mysqli_fetch_object($hasil2)){
                                 ?>
                                <tr>
                                    <td><?php echo $a->nm_menu  ?></td>
                                    <td> &nbsp; </td>
                                    <td><?php echo $a->jumlah  ?></td>
                                    <td> x </td>
                                    <td> <?php echo 'Rp '.$a->harga  ?></td>
                                    <td> &emsp; </td>
                                    <td> <?php echo 'Rp '.$a->total  ?></td>                             
                                </tr>
                                <?php
                                    
                                }
                                
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                    <p>------------------------------------</p>
                    <div class="container">      
                        <table class="table table-bordered">
                            <tbody>
                                <tr colspan="12">
                                    <td > <b>Total Pembayaran </b> </td>
                                </tr>
                                 <tr>
                                    <td>Item</td>
                                    <td> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; </td>
                                    <td> <?php echo $t->jumlah ?> </td>
                                </tr>
                                <tr>    
                                    <td>Total Bayar</td>
                                    <td> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                    <td> <?php echo $t->total ?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p>------------------------------------</p>
		    <h5>TERIMA KASIH ATAS KUNJUNGAN ANDA</h5>
	</center>
</body>
</html>

