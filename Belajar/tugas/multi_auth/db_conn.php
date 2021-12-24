<?php

$host = "localhost";
$user = "rabih";
$password = "ganteng123";
$db = "dreamhome";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    die("Koneksi gagal : ". mysqli_connect_error());
}

?>