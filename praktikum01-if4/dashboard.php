<?php
if (!isset($_POST["nama"]) && !isset($_POST["usia"])) {
	die("nama dan usia tidak tersedia");
} else {
	if (preg_match("/[^A-Za-z'-]/", $_POST['nama'])) {
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
	nama: <?=$_POST["nama"];?>
	usia: <?=$_POST["usia"];?>
</body>
</html>