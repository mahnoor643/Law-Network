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

 include "../admin panel/shared/config.php";
$select_query="select * from lawyer_reg where l_email='$l_email' and pass='$l_pass'";
$select_query_run=mysqli_query($conn,$select_query);
$row=mysqli_fetch_array($select_query_run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $row['l_name']; ?>'s dashboard
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <?php 
include '_shared/_header.php';
?>
    <!-- it's header's end -->

    <div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-12 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="active"><a href="../law network user/index.php"> Home &nbsp;</a></li>
                                <li class="active" aria-current="page">Change Password</li>
</ol>
</nav>
<h2 class="breadcrumb-title">Change Password</h2>
</div>
</div>
</div>
</div>


<!-- sidebar start -->
<?php include '_shared/_sidebar.php'; ?>
<!-- sidebar end -->


<div class="col-md-7 col-lg-8 col-xl-9">
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-12 col-lg-6">

<form method="post">
<div class="form-group">
<label>Old Password</label>
<input type="password" name="oldpass" class="form-control">
</div>
<div class="form-group">
<label>New Password</label>
<input type="password"  name="pass" onChange="onChange()" class="form-control">
</div>
<div class="form-group">
<label>Confirm Password</label>
<input type="password" onChange="onChange()" name="r-pass" class="form-control">
</div>
<div class="submit-section">
<button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
</div>
</form>

<?php
if(isset($_POST['submit'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['r-pass'];
    $notmatched="Your passwords are not matched contact admin for further guidance";
    if($oldpass==$l_pass){
        $pass_change="update lawyer_reg set pass='$newpass' where l_id='$l_id'";
        $pass_change_run=mysqli_query($conn,$pass_change);
        $message="your password is not changed yet";
       

        if(!$pass_change_run){
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else{
            echo "<script>
            window.location.href = '../law network user/lawyer_login.php';
            alert('Your password is changed, Login again with new pass so you can access your account safely');
        </script>";
        }
    }else{
        echo "<script type='text/javascript'>alert('$notmatched');</script>";
    }
}
?>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
    </div>

<!-- footer start -->
<?php
include '_shared/_footer.php';
?>


<!-- footer-end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function onChange() {
      const password = document.querySelector('input[name=pass]');
      const confirm = document.querySelector('input[name=r-pass]');
      if (confirm.value === password.value) {
        confirm.setCustomValidity('');
      } else {
        confirm.setCustomValidity('Passwords do not match');
      }
    }
  </script>



