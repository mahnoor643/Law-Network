<?php
error_reporting(0);

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


$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);
// header end

// it's for adding review for website
$message="review is not added";
if(isset($_POST['addrev'])){
    $web_review=$_POST['websitereview'];
    $insert_website_review="insert into website_review(webrev_from,webrev_c_id,web_review,webrev_status)values('client','$id','$web_review',1)";
    $insert_website_review_run=mysqli_query($conn,$insert_website_review);
    if(!$insert_website_review_run){
      echo "<script type='text/javascript'>alert('$message');</script>";
  }else {
      echo "<script>
      window.location.href = 'index.php';
      alert('Thanks for your Feedback.');
  </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tell about us - Law Network</title>
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
<?php
include '_shared/_header.php';
?>

<!-- header end -->
<div class="container p-5 m-5">
<form method="post">
  <div class="mb-3">
    <label for="validationTextarea" class="form-label">Describe your experience with us in few words</label>
    <textarea class="form-control" name="websitereview" rows="7" id="validationTextarea" require placeholder="Tell us about your experience with us" required></textarea>
  </div>

  <div class="mb-3">
    <button class="btn btn-secondary" name="addrev" type="submit" >Add Review</button>
  </div>
</form>
</div>
<!-- it's footer -->
<?php
include '_shared/_footer.php';
?>