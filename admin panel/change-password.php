<?php
// session_start();
// $_SESSION['email']=$email;
// $_SESSION['password']=$pass;
// if(isset($email)&& isset($pass)){
// }
// else {
//  header('location:index.php');
// }
include "shared/header.php";
require "shared/config.php";
$select_admin_pass="select * from admin";
$select_admin_pass_run=mysqli_query($conn,$select_admin_pass);
$fetchforpass=mysqli_fetch_array($select_admin_pass_run);
$pass=$fetchforpass['password'];
$email=$fetchforpass['email'];
?>



<!-- icon link eye -->
<!-- <link rel="stylesheet" href="npm i bootstrap-icons"> -->

<div class="page-wrapper">
<div class="content container-fluid content-wrap">

<div class="row">
<div class="col-md-12">
<ul class="list-links mb-4">
<li><a href="account-setting.php">Account Settings</a></li>
<li class="active"><a href="change-password.php">Change Password</a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="acc-wrap">
<h6>Change Password</h6>
</div>
<form  method="post">
    <?php
  if(isset($_POST['changes'])){
      $oldpass=$_POST['current_pass'];
      $newpass=$_POST['new_pass'];
     
     if($oldpass==$pass){
          $pass_change="update admin set password='$newpass' where email='$email'";
          $pass_change_run=mysqli_query($conn,$pass_change);
          $message="your password is not changed yet";
          $msg="Your password is changed";
          // $notmatched="Your passwords are not matched";
  
          if(!$pass_change_run){
              echo "<script type='text/javascript'>alert('$message');</script>";
          }else{
              echo "<script type='text/javascript'>alert('$msg');</script>";
          }}
        }
      // }else{
      //    $notmatched="Your passwords are not matched";
      //     echo "<script type='text/javascript'>alert('$notmatched');</script>";
      // }
    
  ?>
  
<div class="row">
<div class="col-md-4">
<div class="form-group form-focus">
<input type="password" name="current_pass" class="form-control floating">
<label class="focus-label">Current Password</label>
</div>
<div class="form-group form-focus">
<input type="password" name="new_pass" class="form-control floating">
<label class="focus-label">New Password</label>


</div>
</div>
</div>

</div>
</div>
<div class="row mt-auto">
<div class="col-md-12">
<div class="submit-sec">
<button type="submit" name="changes" class="btn btn-primary">Save Changes</button>
</form>
</div>
</div>
</div>

</div>
</div>

</div>

<!-- <script>
    function onChange() {
      const password = document.querySelector('input[name=current_password]');
      const confirm = document.querySelector('input[name=new_pass]');
      if (confirm.value === password.value) {
        confirm.setCustomValidity('');
      } else {
        confirm.setCustomValidity('Passwords do not match');
      }
    }
  </script> -->
<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:45:02 GMT -->
</html>