<?php
require "shared/config.php";

$id= $_GET['id'];
$status=$_GET['status'];
if($status==1){
    $update_query= "UPDATE `lawyer_reg` SET `l_status` = '0' WHERE `l_id` = '$id'";
 
}else {
$update_query= "UPDATE `lawyer_reg` SET `l_status` = '1' WHERE `l_id` = '$id'";
// $update_query="UPDATE `appointment_active` SET status=$status where id=$id";
}
$run=mysqli_query($conn,$update_query);
header("location:lawyers.php");

?>