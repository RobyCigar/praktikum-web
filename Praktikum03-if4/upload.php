<?php

$targetfolder = "upload/";
$targetfolder = $targetfolder . basename($_FILES['file']['name']);

var_dump($_FILES);
$file_type = $_FILES['file']['type'];

if ($file_type == "image/png" || $file_type == "image/jpeg" || $file_type == "application/pdf") {
	if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
		echo "<h1>File berhasil di upload di $targetfolder</h1>";
	} else {
		echo "File gagal di upload";
	}

} else {
	echo "Hanya boleh mengupload png, jpeg, dan pdf";
}

?>