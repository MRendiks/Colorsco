<?php
session_start();
require_once '../helper/connection.php';

$id_warna = $_POST['id_warna'];
$kategori_1 = $_POST['kategori_1'];
$kategori_2 = $_POST['kategori_2'];
$kategori_3 = $_POST['kategori_3'];
$warna_1 = $_POST['warna_1'];
$warna_2 = $_POST['warna_2'];
$warna_3 = $_POST['warna_3'];
$warna_4 = $_POST['warna_4'];
$warna_5 = $_POST['warna_5'];


$query = mysqli_query($connection, "UPDATE warna SET kategori_1 = '$kategori_1', kategori_2='$kategori_2', kategori_3='$kategori_3', warna_1='$warna_1', warna_2='$warna_2', warna_3='$warna_3', warna_4='$warna_4', warna_5='$warna_5' WHERE id_warna = '$id_warna'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
}
