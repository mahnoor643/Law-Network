<?php
include "shared/header.php";
require "shared/config.php";

?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="row">
<div class="col-md-8 col-lg-8 col-xl-6">
<div class="profile-info">
<form method="post">
<div class="profile-list">
<h4>My Profile</h4>
<div class="profile-detail">
<label class="avatar profile-cover-avatar">
<img class="avatar-img" src="assets/img/profiles/avatar-01.jpg" alt="Profile Image">
</label>
<div class="pro-name">
    <?php
    $query_profile="SELECT * from admin";
    $run_profile=mysqli_query($conn,$query_profile);
    while($row_profile=mysqli_fetch_array($run_profile)){
    ?>
<p><?php echo $row_profile['email']?></p>
<h4><?php echo $row_profile['name']?></h4>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h6 class="pro-title">Personal Information</h6>
<p>I'm admin of this platform . Since 1889 </p>
</div>
<div class="col-md-4 mb-3">
<h5>Gender</h5>
<p><?php echo $row_profile['gender']?></p>
</div>
<div class="col-md-4 mb-3">
<h5>Age</h5>
<p><?php echo $row_profile['age']?></p>
</div>
<div class="col-md-12">
<h6 class="pro-title">Address & Location</h6>
</div>
<div class="col-md-4">
<h5>Address</h5>
<p><?php echo $row_profile['address']?></p>
</div>
<div class="col-md-4">
<h5>Country</h5>
<p><?php echo $row_profile['country']?></p>
</div>
<div class="col-md-4">
<h5>City</h5>
<p><?php echo $row_profile['city']?></p>
<?php
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

</form>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="assets/plugins/select2/js/select2.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:28 GMT -->
</html>