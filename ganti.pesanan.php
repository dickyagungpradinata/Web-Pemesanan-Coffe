<?php
ini_set('display_errors', 'on');
include_once 'config/dao.php';
include_once 'config/dbconfig.php';
    $idmeja = $_GET['meja'];
    $id = $_GET['id'];
    $update = "UPDATE pemesanan SET id_meja='$idmeja' WHERE id_pmsann='$id'";
    $up = mysqli_query($koneksi, $update);
    $update = "UPDATE meja set stts_meja = 'Tidak Tersedia' where id_meja = '$idmeja'";
    $up = mysqli_query($koneksi, $update);
    header('Location: home.php?id='.$id);

?>