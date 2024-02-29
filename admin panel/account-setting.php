<?php
include "shared/header.php";
require "shared/config.php";

?>


<div class="page-wrapper">
<div class="content container-fluid content-wrap">

<div class="row">
<div class="col-md-12">
<ul class="list-links mb-4">
<li class="active"><a href="account-settings.html">Account Settings</a></li>
<li><a href="change-password.php">Change Password</a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="acc-wrap">
<h6>Acccount Information</h6>
</div>
<?php
 if(isset($_POST['save'])){
    $user=$_POST['username'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $sql_account="UPDATE `admin` SET name='$user' , email='$email' , address='$address' , contact_no='$phone' where a_id=1";
    $run_account=mysqli_query($conn,$sql_account);
 }
?>
<form method="post">
<div class="row">
<div class="col-md-4">
<div class="form-group form-focus">
<input type="text" name="username" class="form-control floating">
<label class="focus-label">User Name</label>
</div>
<div class="form-group form-focus">
<input type="email" name="email" class="form-control floating">
<label class="focus-label">Email Id</label>
</div>
<div class="form-group form-focus">
<input type="text" name="address" class="form-control floating">
<label class="focus-label">Address</label>
</div>
<div class="form-group form-focus">
<input type="text" name="phone" class="form-control floating">
<label class="focus-label">Phone number</label>
</div>
</div>
</div>

<div class="row mt-auto">
<div class="col-md-12">
<div class="submit-sec">
<button type="submit" name="save" class="btn btn-primary">Save Changes</button>
</div>
</div>
</div>
</form>
</div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/account-settings.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:28 GMT -->
</html>