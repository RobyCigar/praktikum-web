<?php

// mengkoneksikan php dengna mysql
// membuat query
// menampilkan

$conn = mysqli_connect("localhost", "root", "", "dreamhome");

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
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>No Branch</th>
            <th>Street</th>
            <th>City</th>
            <th>Post Code</th>
        </tr>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row['branchNo'] ?></td>
                <td><?= $row['street'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['postCode'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>