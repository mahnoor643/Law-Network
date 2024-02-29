<?php
session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
include "../admin panel/shared/config.php";

if(isset($email)&& isset($pass)){
    session_unset();
    session_destroy();
    header('location:index.php');
}
else {
 header('location:clients_login.php');
}
?>