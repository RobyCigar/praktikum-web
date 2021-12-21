<?php


session_start();

include "../config/conn.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."' LIMIT 1";
$result = mysqli_query($conn, $sql);
$jumlah = mysqli_num_rows($result);

if($jumlah > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];

    header("location:../index.php");

}else{
    echo "<script>alert('Username atau password salah');location='login.php';</script>";
}


?>