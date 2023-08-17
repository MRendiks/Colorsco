<?php
session_start();
require_once '../helper/connection.php';

if (isset($_POST['proses'])) {
  $nama_warna = $_POST['nama_warna'];
  $kategori_1 = $_POST['kategori_1'];
  $kategori_2 = $_POST['kategori_2'];
  $kategori_3 = $_POST['kategori_3'];
  $warna_1	= $_POST['warna_1'];
  $warna_2	= $_POST['warna_2'];
  $warna_3	= $_POST['warna_3'];
  $warna_4	= $_POST['warna_4'];
  $warna_5	= $_POST['warna_5'];

  $addwarna = mysqli_query($connection, "INSERT INTO warna VALUES('', 1 ,'$nama_warna', '$kategori_1', '$kategori_2', '$kategori_3', '$warna_1', '$warna_2', '$warna_3', '$warna_4', '$warna_5')") or die("Erro in query $addwarna.".mysqli_error($koneksi));
  if ($addwarna) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Berhasil menambah data'
    ];
    header('Location: ./index.php');
  } else {
    $_SESSION['info'] = [
      'status' => 'failed',
      'message' => mysqli_error($connection)
    ];
    // header('Location: ./index.php');
  }
}

