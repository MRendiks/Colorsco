<?php
session_start();
require_once '../helper/connection.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$username = $_POST['username'];
// $nama = $_POST['nama'];
$password = $_POST['password'];



$query = mysqli_query($connection, "UPDATE users SET nama = '$nama', username = '$username', password = '$password' WHERE id_user = '$id_user'");
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
