<?php
include "../admin panel/shared/config.php";

error_reporting(0);

session_start();
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $message = "Access denied";
$fetch_pass="select * from clients_reg where c_email='$email' and c_pass='$pass'";
$fetch_pass_run=mysqli_query($conn,$fetch_pass);
// if(!$fetch_pass_run){
//   echo "nhi run hui";
// }else {echo "ye hogaya";}
$fetch=mysqli_fetch_array($fetch_pass_run);
if(mysqli_num_rows($fetch_pass_run) > 0){
    $_SESSION['clients_email']=$fetch['c_email'];
    $_SESSION['clients_pass']=$fetch['c_pass'];
    $_SESSION['clients_id']=$fetch['c_id'];
    header('location:appointment.php');
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
  <title>Client's login - Law Network</title>
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style>
  <?php include '_shared/_header.php'; ?>

  <!-- it's header end -->



  <!-- Section: Design Block -->
<section class="text-center text-lg-start">

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign up now</h2>
            <form method="POST">

            <!-- Email input -->
            <div class="form-outline mb-4">
            <label class="form-label d-flex justify-content-start" for="form3Example3">Email address :</label>
              <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
            </div><br>

            <!-- Password input -->
            <div class="form-outline mb-3">
            <label class="form-label d-flex justify-content-start" for="form3Example4">Password :</label>
              <input type="password" name="pass" id="form3Example4" class="form-control form-control-lg"
                placeholder="Enter password" />
            </div>

            <div class="d-flex justify-content-between align-items-center">
             <br>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" name="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button><br>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_reg.php"
                  class="link-danger">Register</a></p>
            </div>

          </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="assets/images/clients_reg.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
</section>

<!-- it's footer -->
  <?php include '_shared/_footer.php'; ?>