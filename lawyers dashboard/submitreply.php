<?php
session_start();
$l_email=$_SESSION['lawyer_email'];
$l_pass=$_SESSION['lawyer_pass'];
$l_id=$_SESSION['lawyer_id'];
if(isset($l_email)&& isset($l_pass)){
 }
 else {
  header('location:../law network user/lawyer_login.php');
 }

$id=$_GET['id'];
include "../admin panel/shared/config.php";

// adding reply

if(isset($_POST['addreply'])){
    $reply=$_POST['reply'];
   
   try{$insert_lawyer_reply="insert into review_reply(reply,r_from,rev_id_FK,rev_l_id_FK) values('$reply','lawyer','$id','$l_id')";
    $insert_lawyer_reply_run=mysqli_query($conn,$insert_lawyer_reply); } catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit; 
     }
     if(!$insert_lawyer_reply_run){
        echo "not submitted your reply";
     }else{
        echo "<script>
        window.location.href = 'reviews.php';
        alert('Reply added successfully');
    </script>";
     }
}
?>