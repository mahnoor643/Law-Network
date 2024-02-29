<?php

include "../admin panel/shared/config.php";
// error_reporting(0);

session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $message = "Access denied";
$fetch_pass="select * from lawyer_reg where l_email='$email' and pass='$pass'";
$fetch_pass_run=mysqli_query($conn,$fetch_pass);

$fetch=mysqli_fetch_array($fetch_pass_run);
if(mysqli_num_rows($fetch_pass_run) > 0){
    $_SESSION['lawyer_email']=$fetch['l_email'];
    $_SESSION['lawyer_pass']=$fetch['pass'];
    $_SESSION['lawyer_id']=$fetch['l_id'];
        header("location:../lawyers dashboard/lawyers_dashboard.php");
}else {
echo "<script type='text/javascript'>alert('$message');</script>";}
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attorney's login - Law Network</title>
    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
    </style>
    <?php include '_shared/_header.php'; ?>

    <!-- it's header end -->

    <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="assets/images/lawyer.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form  method="POST">
          <h2><b>Attorney's Sign in</b></h2><br>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="pass" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
          
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="lawyer_reg.php"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>

    <?php include '_shared/_footer.php'; ?>