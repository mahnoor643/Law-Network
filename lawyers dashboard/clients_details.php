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
$b_id=$_GET['id'];
include "../admin panel/shared/config.php";
$select_query="select * from lawyer_reg where l_email='$l_email' and pass='$l_pass'";
$select_query_run=mysqli_query($conn,$select_query);
$row=mysqli_fetch_array($select_query_run);

$fetchclient="select * from appointments join clients_reg on clients_reg.c_id=appointments.c_id_FK where lawyer_id='$l_id' and b_id='$b_id'";
$fetchclient_run=mysqli_query($conn,$fetchclient);
$fetc=mysqli_fetch_array($fetchclient_run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $row['l_name']; ?>'s dashboard
    </title>
    <style>
         .parallax {
            background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/image/clientdetails.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            padding: 8.5rem 0px;
            }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <?php 
include '_shared/_header.php';
?>
    <!-- it's header's end -->

   <!-- it's label div -->
   <div class="parallax">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 style="color:grey;" class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">
                    Client Details
                    </h2>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>


<!-- it's client's info table -->

<div class="container p-5 m-5">


<table class="table table-bordered p-5 m-5">
  <tbody>
    <tr>
        <td rowspan="8"><img src="data:<?php echo $fetc['c_pic_type']; ?>;base64,<?php echo base64_encode($fetc['c_pic']); ?>" alt="" class="img-fluid">
</td>
      <th scope="row">Name</th>
      <td><?php echo $fetc['c_name']; ?></td>
    </tr>
    <tr>
      <th scope="row">City</th>
      <td><?php echo $fetc['cl_city']; ?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $fetc['cl_address']; ?></td>
    </tr>
    <tr>
      <th scope="row">Phone #</th>
      <td><?php echo $fetc['cl_num']; ?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo $fetc['c_email']; ?></td>
    </tr>
    <tr>
      <th scope="row">Date</th>
      <td><?php echo $fetc['b_date']; ?></td>
    </tr>
    <tr>
      <th scope="row">Complaint Title</th>
      <td><?php echo $fetc['cl_ques_title']; ?></td>
    </tr>
    <tr>
      <th scope="row">Complaint</th>
      <td><?php echo $fetc['cl_que']; ?></td>
    </tr>
  </tbody>
</table>
<div class="d-flex justify-content-end">
    <a href="my_appointments.php" class="btn btn-secondary">Back to Appointments</a>&nbsp;
    <?php if($fetc['status'] == 'waiting'){ ?>
      <a href="appointment_accept.php?id=<?php echo $fetc['b_id']; ?>" class="btn btn-sm bg-success-light">
                        <i class="fas fa-check"></i> Accept
                    </a>&nbsp;
                    <a href="cancel_appointment.php?id=<?php echo $fetc['b_id']; ?>" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
  <?php  } else {

  
    ?>
   
                    <a href="cancel_appointment.php?id=<?php echo $fetc['b_id']; ?>" class="btn btn-sm bg-danger-light">
                        <i class="fas fa-times"></i> Cancel
                    </a>
                    <?php } ?>
</div>
</div></div>

<!-- footer start -->
<?php
include '_shared/_footer.php';
?>

    
<!-- footer-end -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
