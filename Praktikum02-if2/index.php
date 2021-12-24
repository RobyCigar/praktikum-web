<?php
$first_name = "rabih ";
$last_name = "utomo";
$age = 12;
define("fullname", "rabih Utomo");

// echo $fullname;

// struktur kendali
// if($age > 17) {
//     echo "lebih dari 17 tahun";
// } else {
//     echo "kurang dari 17 tahun";
// }

$nilai_web = array(100, 90, 22);


// var_dump($nilai_web);
// echo "<br>";
// echo $nilai_web[1];

for ($i = 0; $i < count($nilai_web); $i++) {
    echo "value: " . $nilai_web[$i];
    echo "<br>";
}

// 1. Buatlah function bernama fizzbuzz
// menerima parameter parameter angka, N
// eccho 0 -> N, memakai loop
// jika bilangan tersebut dapat dibagi 3 echo "fizz"
// jika bilangan tersebut dapat dibagi 5 echo "buzz"
// namun jika bilangan dapat dibagi 3 & 5 echo "fizz buzz";


function fizzbuzz($N) {
    
    for($i=0; $i < $N; $i++) {

        if ($i % 5 == 0 && $i % 3 == 0) {
            echo "fizz buzz<br>";
        } else if($i % 3 == 0) {
            echo "fizz<br>";
        } else if($i % 5 == 0) {
            echo "buzz<br>";
        } else {
            echo $i . "<br>";
        }




    }

}

fizzbuzz(90);

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
    <h1><?php echo $first_name; ?> </h1>
    <h1><?= $first_name; ?> </h1>

</body>

</html>