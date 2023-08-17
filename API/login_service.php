<?php 
require 'connect_db.php';

$username   = $_POST['username'];
$password   = $_POST['password'];

$query      = "SELECT username FROM users WHERE username='$username' AND password='$password'";
$odj_query  = mysqli_query($koneksi, $query);
$data       = mysqli_fetch_array($odj_query);


if ($data) {
    echo json_encode(
        array(
            'response' => true,
            'payload' => array(
                "username" => $data["username"]
            ) 
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