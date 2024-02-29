<?php
require "shared/config.php";

$id= $_GET['id'];
$status=$_GET['status'];
if($status==1){
    $update_query= "UPDATE `website_review` SET `webrev_status` = '0' WHERE `webrev_id` = '$id'";
 
}else {
$update_query= "UPDATE `website_review` SET `webrev_status` = '1' WHERE `webrev_id` = '$id'";
// $update_query="UPDATE `appointment_active` SET status=$status where id=$id";
}
$run=mysqli_query($conn,$update_query);
header("location:web-review.php");

?>