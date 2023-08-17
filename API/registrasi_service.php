<?php 
require 'connect_db.php';

$nama       = $_POST['nama'];
$username   = $_POST['username'];
$password   = $_POST['password'];

$query      = "INSERT INTO users VALUES('', '$nama', '$username', '$password')";
$odj_query  = mysqli_query($koneksi, $query);


if ($odj_query) {
    echo json_encode(
        array(
            'response' => true,
            'payload' => null
        )
    );
}else {
    echo json_encode(
        array(
            'response' => false,
            'payload' => null
        )
    );
}

header('Content-Type: application/json');



?>