<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("location: login.php");
}

include "db_conn.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    function validate($data)
    {
        $data = trim($data); // "  Hello world  "
        $data = stripslashes($data); // mengonvert \' becomes ' 
        $data = htmlspecialchars($data); // <a>fdsafsa</a>
        return $data;
    }

    $uname = validate($_POST["username"]);
    $pass = validate($_POST["password"]);

    // md5, sha256, md1
    $md5pass = hash("md5", $pass);

    if (empty($uname)) {
        header("location: login.php?error=Username wajib diisikan");
        exit();
    } else if (empty($pass)) {
        header("location: login.php?error=Password harus diisi");
    } else {
        $sql = "SELECT * FROM users where username='$uname' AND password='$md5pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['username'] === $uname && $row['password'] === $md5pass) {
                $_SESSION['username'] = $row["username"];
                $_SESSION['name'] = $row["name"];
                $_SESSION['id'] = $row["id"];

                header("location: index.php");
                exit();
            } else {
                die("login gagal");
            }
        } else {
            header("location: login.php?error=username atau password tidak ditemukan");
        }
    }
} else {
    header("location: login.php?error=Username dan password harus diisi");
}
