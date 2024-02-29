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
        <?php echo $row['l_name']; ?>'s appointments
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
                                <li class="active" aria-current="page">My Appointments</li>
</ol>
</nav>
<h2 class="breadcrumb-title">Appointments</h2>
</div>
</div>
</div>
</div>


<!-- sidebar start -->
<?php include '_shared/_sidebar.php'; ?>
<!-- sidebar end -->


    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="appointments">
            <?php
 $app_select="select * from appointments join clients_reg on clients_reg.c_id=appointments.c_id_FK where lawyer_id='$l_id' and status='waiting'";
 $app_select_run=mysqli_query($conn,$app_select);
while($app_fetch=mysqli_fetch_array($app_select_run)){
 ?>
            <div class="appointment-list">
                <div class="profile-info-widget">
                    <a href="patient-profile.html" class="booking-doc-img">
                        <img src="data:<?php echo $app_fetch['c_pic_type']; ?>;base64,<?php echo base64_encode($app_fetch['c_pic']); ?>"
                            alt="<?php echo $app_fetch['c_name']; ?>">
                    </a>
                    <div class="profile-det-info">
                        <h3><a class="a-col" href="patient-profile.html">
                                <?php echo $app_fetch['c_name']; ?>
                            </a></h3>
                        <div class="patient-details">
                            <h6 class="mb-3">Complaint:
                                <?php echo $app_fetch['cl_ques_title']; ?>
                            </h6>
                            <h5><i class="far fa-clock"></i>
                               
                                <?php echo $app_fetch['b_date']; ?>
                            </h5>
                            <h5><i class="fas fa-map-marker-alt"></i>
                                <?php echo $app_fetch['cl_address']; ?>,
                                <?php echo $app_fetch['cl_city']; ?>
                            </h5>
                            <h5><i class="fas fa-envelope"></i> <a class="a-col"
                                    href="mailto:mahnoort643@gmail.com , <?php echo $app_fetch['c_email']; ?>"
                                    class="__cf_email__" data-cfemail="74061d171c15061034110c15190418115a171b19">
                                    <?php echo $app_fetch['c_email']; ?>
                                </a></h5>
                        </div>
                    </div>
                </div>
                <div class="appointment-action">
                    <a href="clients_details.php?id=<?php echo $app_fetch['b_id']; ?>" class="btn btn-sm bg-info-light">
                        <i class="far fa-eye"></i> View Details
                    </a>
                    <a href="appointment_accept.php?id=<?php echo $app_fetch['b_id']; ?>" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>
                    <a href="cancel_appointment.php?id=<?php echo $app_fetch['b_id']; ?>" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                </div>
            </div>

            <?php } ?>

<div> No Appointments to approve</div>
        </div>
    </div>
    </div>
    </div>
    </div>
    
    <?php
include '_shared/_footer.php';
?>

    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    