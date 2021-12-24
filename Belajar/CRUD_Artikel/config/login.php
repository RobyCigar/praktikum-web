<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    header("location:../index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css"> 

    <title>Login Page with Database</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
    
    <form class="border shadow p-3 rounded" action="cek-login.php" method="POST" style="width: 450px;">
    
    <h2>LOGIN</h2>

    <span>
        <?php

        if (isset($_GET['error'])){
            echo "<p class='error' style='background: #E57676; color:#FFFFFF;'>";
            echo $_GET['error'];
        }
    
        ?>
    </span>

        <div class="mb-3">
            <label class="form-label">User name</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div> 

        <button type="submit" class="btn btn-primary" >Login</button>
    </form>
    </div>

<script src="../assets/js/jquery.js"></script> 
<script src="../assets/js/popper.js"></script> 
<script src="../assets/js/bootstrap.js"></script>
  </body>
</html>