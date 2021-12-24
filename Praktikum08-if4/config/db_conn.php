<?php

$sname = "localhost";
$unmae = "debian-sys-maint";
$password = "jOeXXxOYTsHWbJbi";
$db_name = "login_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if(!$conn){
    echo "Connection failed!";
}



?>