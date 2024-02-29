<?php
session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
if(isset($email)&& isset($pass)){
}
else {
 header('location:../law network user/clients_login.php');
}
include "../admin panel/shared/config.php";

$rev_id=$_GET['id'];
$lawyer_id=$_GET['lawyer_id'];

 if(isset($_POST['addreply'])){
    $reply=$_POST['reply'];

   try{$insert_reply="insert into review_reply(reply , r_from , rev_id_FK , rev_c_id_FK) values('$reply','client','$rev_id','$id')";
    $insert_reply_run=mysqli_query($conn,$insert_reply); } catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit; 
     } 

     if(!$insert_reply_run){
        echo "your reply is not added";
     }else{
         ?><script>
        window.location.href = 'attorney-details.php?id=<?php echo $lawyer_id; ?>';
        alert('Reply added successfully');
    </script><?php
     }
}
?>