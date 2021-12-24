<?php

session_start();

$_SESSION['id_user']='';
$_SESSION['username']='';
$_SESSION['nama']='';

unset($_SESSION['id_user']);
unset($_SESSION['username']);
unset($_SESSION['nama']);

session_unset();
session_destroy();

header("location:login.php");

?>