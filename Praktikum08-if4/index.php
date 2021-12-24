<?php
include('config/db_conn.php');
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <title>Admin PWL</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=admin">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?menu=artikel">Artikel</a>
        </li>
        <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Siswa
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Siswa Kelas 1</a>
          <a class="dropdown-item" href="#">Siswa Kelas 2</a>
          <a class="dropdown-item" href="#">Siswa Kelas 2</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Alumni</a>
        </div>
      </li>   -->
      </ul>
      <span class="navbar-text mr-3">
        <?php
        if (isset($_SESSION['name'])) {
          echo "Halo admin " . $_SESSION['name'];
        }
        ?>
      </span>

      <a href="config/logout.php" class="btn btn-outline-success mr-2">Logout</a>
    </div>
  </nav>
  <br />
  <br />

  <div class="module_content">
    <div class="module_content">
      <div align="center">
        <?php include "config/content.php"; ?>
      </div>
    </div>
  </div>

  <hr>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>