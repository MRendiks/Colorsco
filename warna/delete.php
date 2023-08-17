<?php
session_start();
require_once '../helper/connection.php';

$id_warna = $_GET['id_warna'];

$result = mysqli_query($connection, "DELETE FROM warna WHERE id_warna='$id_warna'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
