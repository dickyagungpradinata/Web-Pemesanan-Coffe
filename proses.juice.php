<?php
include_once './config/dbconfig.php';

session_start();
$id_menus = $_GET['id_menu'];
$id_pemesanan = $_GET['id'];
$harga = $_GET['harga'];

if (isset($_SESSION['tambah'][$id_menus]))
{
    $_SESSION['tambah'][$id_menus]+=1;
}
 else {
    $_SESSION['tambah'][$id_menus]=1;
}


$query = "INSERT INTO detail_pemesanan VALUES ('','$id_pemesanan','$id_menus','$harga')";
$pesan = mysqli_query($koneksi, $query);


header("location:juice.php?id=".$id_pemesanan);
