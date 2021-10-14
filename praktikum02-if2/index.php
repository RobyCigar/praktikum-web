<?php 

$name = "Rabih";
$age = 0;
$grade = array(90, 100, "30");

function checkAge($name, $age, $grade) {
    if ($age < 18) {
        echo "Usia kamu belum cukup <br>";
    } else if ($age >= 18 && $age <= 25) {
        echo "Selamat datang " . $name . " di AMIKOM park <br>";
        for ($i = 0; $i < count($grade); $i++) {
            echo "nilai ke " . ($i + 1) . " adalah " . $grade[$i] . "<br>";
        }
        echo "<br>";
    } else {
        echo "Usia kamu ketuaan <br>";
    }
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
    <h1>Tiket masuk AMIKOM park </h1>
    <?php
    // if ($age < 18) {
    //     echo "Usia kamu belum cukup <br>";
    // } else if ($age >= 18 && $age <= 25) {
    //     echo "Selamat datang " . $name . " di AMIKOM park <br>";
    //     for ($i = 0; $i < count($grade); $i++) {
    //         echo "nilai ke " . ($i + 1) . " adalah " . $grade[$i] . "<br>";
    //     }
    //     echo "<br>";
    // } else {
    //     echo "Usia kamu ketuaan <br>";
    // }
        
        checkAge($name, $age, $grade);
    ?>
</body>
</html>