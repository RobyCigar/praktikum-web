<?php

$conn = mysqli_connect("localhost", "root", "", "praktikum");


$sql = "SELECT * FROM alamat";
$query = mysqli_query($conn, $sql);

$rows = [];

while ($hasil = mysqli_fetch_assoc($query)) {
    $rows[] = $hasil;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- please create table  -->
    <table border="1">
        <tr>
            <th>No Rumah</th>
            <th>Jalan</th>
            <th>Kota</th>
            <th>Kode Pos</th>
        </tr>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row['no_rumah']; ?></td>
                <td><?= $row['jalan']; ?></td>
                <td><?= $row['kota']; ?></td>
                <td><?= $row['kode_pos']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>