<?php

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

function createSlide($gambarAsli, $alamatGambarBesar, $namaBaru) {
// mendapatkan id image
    $id = $_GET['id'];
    include "db_conn.php";
    $query = "SELECT gambar FROM artikel WHERE id = $id";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);

    $proporsi = 0.1; // thumbnail 10% dari ukuran asli
// membuat image dari string database
    $img = imagecreatefromstring($data['image']);

// mendapatkan ukuran panjang dan tinggi pixel
    $width = imagesx($img);
    $height = imagesy($img);

// mengatur panjang dan lebar ukuran thumbnail
// sesuai proporsi
    define("T_WIDTH", $width * $proporsi);
    define("T_HEIGHT", $height * $proporsi);

// menyiapkan image baru untuk thumbnail
    $img_copy = imagecreatetruecolor(T_WIDTH, T_HEIGHT);

// membuat image untuk thumbnail dengan mengubah ukuran
// image asli
    imagecopyresized($img_copy, $img, 0, 0, 0, 0, T_WIDTH, T_HEIGHT, $width, $height);

// output thumbnail
    header("Content-type: image/jpeg");
    imagejpeg($img_copy);











    list($lebar_asli, $tinggi_asli) = getimagesize('../../upload/' . $alamatGambarBesar . '/' . $namaBaru); // ambil ukuran asli image
    $width = 560;
    $height = 164;
    $thmb = imagecreatetruecolor($width, $height); //ukuran slide
    if (strpos($gambarAsli, ".gif")) {
        $current_image = imagecreatefromgif('../../upload/' . $alamatGambarBesar . '/' . $namaBaru);
    }
    if ((strpos($gambarAsli, ".jpg")) || (strpos($gambarAsli, ".jpeg"))) {
        $current_image = imagecreatefromjpeg('../../upload/' . $alamatGambarBesar . '/' . $namaBaru); //open image and resize
    }
    if (strpos($gambarAsli, ".bmp")) {
        $current_image = imagecreatefromwbmp('../../upload/' . $alamatGambarBesar . '/' . $namaBaru);
    }
    if (strpos($gambarAsli, ".png")) {
        $current_image = imagecreatefrompng('../../upload/' . $alamatGambarBesar . '/' . $namaBaru);
    }
    if ($lebar_asli > $tinggi_asli) {// cek jika lebarnya labih besar dari tingginya
        $height = 164; //200
        $lebar = ceil(($persegi / $tinggi_asli) * $lebar_asli);
        $ceilx = ceil(($lebar / 2) - ($persegi / 2));
        imagecopyresized($thmb, $current_image, 0, 0, $ceilx, 0, $lebar, $height, $lebar_asli, $tinggi_asli);

//                 0,           0,      $ceilx,           0,      $lebar,     $height, $lebar_asli, $tinggi_asli
//       int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h 
//       
//      dari src_w lebar dan src_h tinggi pada posisi (src_x, src_y) 
//      dan tempatkan di daerah persegi panjang 
//      dst_image 200*200 dari dst_w lebar dan dst_h tinggi 
//      pada posisi (dst_x, dst_y).
//      
//      imagecopyresized ( resource 560x164 , resource $src_image_asli , 
//      int $dst_x , int $dst_y , 560,164
//      int $src_x_asli , int $src_y_asli , 777,629
//      int $dst_width , int $dst_height , 560,164
//      int $src_w_asli , int $src_h_asli );
    }
    imagejpeg($thmb, '../../upload/thumbs/' . $alamatGambarBesar . '/' . $namaBaru, 75);
    imagedestroy($thmb);
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