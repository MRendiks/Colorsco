<?php
session_start();
require_once '../helper/connection.php';

$nama = $_POST['nama'];
$username = $_POST['username'];

$password = $_POST['password'];

$query = mysqli_query($connection, "INSERT INTO users values('' ,'$nama', '$username', '$password')");
if ($query) {
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
