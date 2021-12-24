<?php
if (!isset($_GET["nama"]) && !isset($_GET["usia"])) {
    die("nama dan usia tidak tersedia");
} else {
    if (preg_match("/[^A-Za-z'\s-]/", $_GET['nama'])) {
        die("nama harus huruf saja");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
</head>

<body>
    <h1>Selamat datang di dashboard</h1>
    <h1>Dashboard ini menggunakan method GET</h1>
    <h1>Perhatikan URL! Jika menggunakan GET, maka hasil input dari form sebelumnya akan tampil di URL</h1>
    nama: <?= $_GET["nama"]; ?>
    usia: <?= $_GET["usia"]; ?>
</body>

</html>