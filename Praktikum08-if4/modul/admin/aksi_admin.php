<?php

include "../../config/db_conn.php";
include "../../config/url.php";
$act = (isset($_GET['act'])) ? $_GET['act'] : 'none';
$menu = (isset($_GET['menu'])) ? $_GET['menu'] : 'none';
if ($act == 'insert' || $act == 'update') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
} else {
    $id = $_GET['id'];
}

switch ($act) {
    case 'insert':
        $query = "INSERT INTO users(username, password)
                        VALUES ('$username', '$password')";
        $sql = mysqli_query($conn,$query) or die("cek : " . $conn->error);
        if ($sql) {
            url("admin&con=0");
        } else {
            url("admin&con=1");
        }
        break;

    case 'update':
        $query = "UPDATE users SET password='$password' WHERE username='$username'"; 
        $sql = mysqli_query($conn,$query) or die("cek : " . $conn->error);
        if ($sql) {
            url("admin&con=2");
        } else {
            url("admin&con=3");
        }
        break;

    case 'delete':
        $query = "delete from users where id='$id'";
        $sql = mysqli_query($conn,$query) or die("cek : " . $conn->error);
        if ($sql) {
            url("admin&con=4");
        } else {
            url("admin&con=5");
        }
        break;
    default:
        break;
}
?>
