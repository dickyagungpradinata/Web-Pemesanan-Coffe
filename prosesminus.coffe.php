<?php
include_once './config/dbconfig.php';


session_start();
$id_menus = $_GET["id_menu"];
$id = $_GET['id'];

    $_SESSION['tambah'][$id_menus]--;
    if($_SESSION['tambah'][$id_menus] <= 0){
        unset($_SESSION["tambah"][$id_menus]);
    } 

$query = "SELECT id_detail FROM detail_pemesanan WHERE id_menu = '$id_menus' and id_pmsann='$id' limit 1";
$hasildetail = mysqli_query($koneksi, $query);
$p = mysqli_fetch_array($hasildetail);
$hasildet = $p['id_detail'];
    
$query = "DELETE FROM detail_pemesanan WHERE id_detail = '$hasildet'";
$kurangpesan = mysqli_query($koneksi, $query);


header("location:coffe.php?id=".$id);


