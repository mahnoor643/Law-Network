<?php
require "shared/config.php";

session_start();
$_SESSION['email']= $email;
$_SESSION['password']=$pass;


if(isset($email)&& isset($pass)){
    session_unset();
    session_destroy();
    header('location:index.php');
}
else {
 header('location:login.php');
}
?>