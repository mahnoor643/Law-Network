<?php 
session_start();
$l_email=$_SESSION['lawyer_email'];
$l_pass=$_SESSION['lawyer_pass'];
$l_id=$_SESSION['lawyer_id'];
include "../admin panel/shared/config.php";

if(isset($l_email)&& isset($l_pass)){
    session_unset();
    session_destroy();
    header('location:../law network user/index.php');
 }
 else {
  header('location:../law network user/lawyer_login.php');
 }

?>