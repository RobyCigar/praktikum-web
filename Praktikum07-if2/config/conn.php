<?php

$host = "localhost";
$user = "debian-sys-maint";
$password = "jOeXXxOYTsHWbJbi";
$db = "dreamhome";

$conn = mysqli_connect($host, $user, $password, $db);

if(!$conn){
    die("Koneksi gagal:".mysqli_connect_error());
}
