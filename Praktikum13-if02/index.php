<?php

include "config/conn.php";

//login

session_start();

if (!isset($_SESSION['username'])) {
    //echo "<script>alert('Anda harus login dulu untuk entry data!');location='./login/login.php';</script>";
    header("location:./login/login.php");
}


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;


$nomor = $halaman_awal + 1;


if (isset($_GET['search'])) {
    $query = "SELECT * FROM branch WHERE (street LIKE '%" . $_GET['query'] . "%') OR (city LIKE '%" . $_GET['query'] . "%') OR (postCode LIKE '%" . $_GET['query'] . "%')";

    $result = mysqli_query($conn, $query);

    $jumlah_data = mysqli_num_rows($result);
    $total_halaman = ceil($jumlah_data / $batas);


    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $rows[] = $data;
        }
    } else {
        die("Data not found");
    }
} else {
    $query = "SELECT * FROM branch LIMIT $halaman_awal, $batas";

    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $jumlah_data = mysqli_num_rows($result);
    $total_halaman = ceil($jumlah_data / $batas);

    while ($data = mysqli_fetch_array($result)) {
        $rows[] = $data;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <form action="index.php" method="GET" class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Search">
            <button class="btn btn-outline-secondary" name="search" value="search">Search</button>
        </form>
        <table class="table" border="1">
            <tr>
                <th>No Branch</th>
                <th>Street</th>
                <th>City</th>
                <th>Post Code</th>
                <th>Action</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
            <?php
                
            ?>
                <tr>
                    <td><?= $row['branchNo'] ?></td>
                    <td><?= $row['street'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['postCode'] ?></td>
                    <td><img src="" alt=""></td>
                    <td>
                        <a href="edit.php?branchNo=<?= $row['branchNo'] ?>">EDIT</a>
                        <a href="proses.php?action=hapus&branchNo=<?= $row['branchNo'] ?>" onclick="return confirm('Yakin mau hapus data ini?')">HAPUS</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <nav class="d-flex justify-content-end">
            <ul class="pagination">
                <?php if ($halaman > 1 ) { ?>
                    <li class="page-item">
                        <a class="page-link" <?= "href='?halaman=$previous'" ?>>Next</a>
                    </li>
                <?php } ?>
                <?php
                for ($x = 1; $x <= $total_halaman; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <?php if ($halaman < $total_halaman) { ?>
                    <li class="page-item">
                        <a class="page-link" <?= "href='?halaman=$next'" ?>>Next</a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <a href="form.php">[+]Tambah Data</a>
    <br>
    <br>
    <a href="./login/logout.php">LOGOUT!!</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>