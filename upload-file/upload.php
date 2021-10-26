<?php
$targetfolder = "upload/";

$targetfolder = $targetfolder . basename($_FILES['file']['name']);

$file_type = $_FILES['file']['type'];

echo "target folder";

if (
    $file_type == "application/pdf" ||
    $file_type == "image/png" ||
    $file_type == "image/jpeg"
) {
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
        echo "File Berhasil di Upload  file " . $_FILES['file']['name'] . " is uploaded";
    } else {
        echo "File Gagal di Upload";
    }
} else {

    echo "Hanya Boleh upload PDF, JPEG PNG .<br>";
}
