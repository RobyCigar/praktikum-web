<?php
if (!isset($_POST["nama"]) && !isset($_POST["usia"])) {
	die("nama dan usia tidak tersedia");
} else {
	if (preg_match_all("/[^A-Za-z'\s-]/", $_POST['nama'])) {
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
	<h1>Dasboard ini menggunakan method POST</h1>
	nama: <?= $_POST["nama"]; ?>
	usia: <?= $_POST["usia"]; ?>
</body>

</html>