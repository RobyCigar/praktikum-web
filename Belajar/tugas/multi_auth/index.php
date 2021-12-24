<?php


session_start();

if (!isset($_SESSION['username'])) {
    header("location:./login/login.php");
}

// mengkoneksikan php dengna mysql
// membuat query
// menampilkan

include "./db_conn.php";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM branch ORDER BY branchNo") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($result)) {
    $rows[] = $data;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <table class="table table-striped mt-4" border="1">
            <tr>
                <th>No Branch</th>
                <th>Street</th>
                <th>City</th>
                <th>Post Code</th>
                <?php
                if ($_SESSION["role"] == "admin") {
                ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row['branchNo'] ?></td>
                    <td><?= $row['street'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['postCode'] ?></td>
                    <?php
                    if ($_SESSION["role"] == "admin") {
                    ?>
                        <td>
                            <a href="edit.php?branchNo=<?= $row['branchNo'] ?>">EDIT</a>
                            <a href="proses.php?action=hapus&branchNo=<?= $row['branchNo'] ?>" onclick="return confirm('Yakin mau hapus data ini?')">HAPUS</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>

        </table>
        <?php
        if ($_SESSION["role"] == "admin") {
        ?>
            <a href="form.php">[+]Tambah Data</a>
        <?php } ?>
        <br>
        <br>
        <a href="./login/logout.php">LOGOUT!</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>