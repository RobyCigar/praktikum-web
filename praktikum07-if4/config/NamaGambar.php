<?php

function validate($data)
{
    global $conn;
    $data = trim($data); // "   dafaf a " -> "fdsaf"
    $data = mysqli_real_escape_string($conn, $data);
    $data = htmlspecialchars($data);
    return $data;
}

function getNamaGambar($namagambar, $target) {
    $tanggal2 = date("dmY");
    $targetnama = $tanggal2 . "_" . rand() . "_" . $namagambar;
    if (file_exists('../upload/' . $target . '/' . $targetnama)) {
        $targetnama = rand() . "_" . $targetnama;
        return $targetnama;
    } else {
        return $targetnama;
    }
}

function createThumb($gambarAsli, $alamatGambarBesar, $namaBaru) {
    list($lebar_asli, $tinggi_asli) = getimagesize('../../upload/' . $alamatGambarBesar . '/' . $namaBaru); // ambil ukuran asli image
    $persegi = 400; //ukuran thumbnail, artinya 200 x 200;
    $thmb = imagecreatetruecolor($persegi, $persegi); //jadi persegi
    if (strpos($gambarAsli, ".gif")) {
        $current_image = imagecreatefromgif('../../upload/' . $alamatGambarBesar . '/' . $namaBaru);
    }
    if ((strpos($gambarAsli, ".jpg")) || (strpos($gambarAsli, ".jpeg")) || (strpos($gambarAsli, ".JPG"))) {
        $current_image = imagecreatefromjpeg('../../upload/' . $alamatGambarBesar . '/' . $namaBaru); //open image and resize
    }
    if (strpos($gambarAsli, ".bmp")) {
        $current_image = imagecreatefromwbmp('../../upload/' . $alamatGambarBesar . '/' . $namaBaru);
    }
    if (strpos($gambarAsli, ".png")) {
        $current_image = imagecreatefrompng('../../upload/' . $alamatGambarBesar . '/' . $namaBaru);
    }
    if ($lebar_asli > $tinggi_asli) {// cek jika lebarnya labih besar dari tingginya
        $tinggi = $persegi;
        $lebar = ceil(($persegi / $tinggi_asli) * $lebar_asli);
        $ceilx = ceil(($lebar / 2) - ($persegi / 2));
        imagecopyresized($thmb, $current_image, 0, 0, $ceilx, 0, $lebar, $tinggi, $lebar_asli, $tinggi_asli);
    } else {
        $lebar = $persegi;
        $tinggi = ceil(($persegi / $lebar_asli) * $tinggi_asli);
        $ceily = ceil(($tinggi / 2) - ($persegi / 2));
        imagecopyresized($thmb, $current_image, 0, 0, 0, $ceily, $lebar, $tinggi, $lebar_asli, $tinggi_asli);
    }
    imagejpeg($thmb, '../../upload/thumbs/' . $alamatGambarBesar . '/' . $namaBaru, 75);
    imagedestroy($thmb);

//    echo $namaBaru;
//    echo '<img src="../../upload/albumfoto/' . $namaBaru . '">';
}

function findexts($str) {
    $fileext = strtolower($str);
    $i = strrpos($fileext, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($fileext) - $i;
    $ext = substr($fileext, $i + 1, $l);
    return $ext;
}
?>
