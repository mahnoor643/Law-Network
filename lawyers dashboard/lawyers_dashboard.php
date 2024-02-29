<?php 
session_start();
require "../admin panel/shared/config.php";
$l_email=$_SESSION['lawyer_email'];
$l_pass=$_SESSION['lawyer_pass'];
$l_id=$_SESSION['lawyer_id'];
if(isset($l_email)&& isset($l_pass)){
 }
 else {
  header('location:../law network user/lawyer_login.php');
 }


$select_query="select * from lawyer_reg where l_email='$l_email' and pass='$l_pass'";
$select_query_run=mysqli_query($conn,$select_query);
$row=mysqli_fetch_array($select_query_run);

// it's for adding our total no. of appointments
$total_appointments="select count(b_id) from appointments where lawyer_id='$l_id'";
$total_appointments_run=mysqli_query($conn,$total_appointments);
$total_app=mysqli_fetch_array($total_appointments_run);

// it's for adding total of our client's
$total_clients="select count(b_id) from appointments where status='approved' and lawyer_id='$l_id'";
$total_clients_run=mysqli_query($conn,$total_clients);
$total_cl=mysqli_fetch_array($total_clients_run);

// it's total of cancelled appointments
$total_cancelled="select count(b_id) from appointments where status='cancelled' and lawyer_id='$l_id'";
$total_cancelled_run=mysqli_query($conn,$total_cancelled);
$cancelled=mysqli_fetch_array($total_cancelled_run);
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

    <div class="breadcrumb-bar" style="backgroud-color:gray;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-12 col-12">
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                            <li class="active"><a href="../law network user/index.php"> Home &nbsp;</a></li>
                                <li class="active" aria-current="page">Lawyer's Dashboard</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>


<!-- sidebar start -->
<?php include '_shared/_sidebar.php'; ?>
<!-- sidebar end -->

 <!-- it's after header work -->

                
                <div class="col-md-7 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="circle-bar circle-bar1">
                                            <div class="circle-graph1" data-percent="75">
                                                <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                            <h6>Total Clients</h6>
                                            <h3><?php echo $total_cl['count(b_id)']; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="circle-bar circle-bar2">
                                            <div class="circle-graph2" data-percent="75">
                                                <img src="assets/img/icon-03.png" class="img-fluid" alt="patient">
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                            <h6>Total Appointments</h6>
                                            <h3><?php echo $total_app['count(b_id)']; ?></h3>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card dash-cards">
                                <div class="card-body">
                                    <div class="dash-top-content">
                                        <div class="circle-bar circle-bar3">
                                            <div class="circle-graph3" data-percent="50">
                                                <img src="assets/img/icon-4.png" class="img-fluid" alt="patient">
                                            </div>
                                        </div>
                                        <div class="dash-widget-info">
                                            <h6>Total Appointments Cancelled</h6>
                                            <h3><?php echo $cancelled['count(b_id)']; ?></h3>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- it's appointments info -->

                        <div class="col-lg-12">
                            <div class="card dash-cards">
                                <div class="card-header">
                                    <div class="today-appointment-title">
                                        <h5 class="mb-0">Today’s Appointments</h5>
                                        <a href="my_clients.php">
                                            <h6 class="mb-0">View All <i class="feather-arrow-right"></i></h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-0">
                                            <tbody>
                                            <tr>
                                                    <th>
                                                        <h5 class="table-avatar ">
                                                           <b> Client's Profile </b>
                                                        </h5>
                                                    </th>
                                                    <td>
                                                        <div class="consult-type d-flex flex-column">
                                                            <h5 class="mb-0"><b>Case Title</b></h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="consult-type d-flex flex-column">
                                                            <h5 class="mb-0"><b>City</b></h5>
                                                           
                                                        </div>
                                                    </td>
                                                   
                                                </tr>
                                                <?php
                                                $app_select="select * from appointments join clients_reg on clients_reg.c_id=appointments.c_id_FK where lawyer_id='$l_id' and 
                                                status='approved' and b_date=curdate()";
                                                $app_select_run=mysqli_query($conn,$app_select);
                                                while($app_fetch=mysqli_fetch_array($app_select_run)){
                                                ?>
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar ">
                                                            <a href="patient-profile.html"
                                                                class="avatar avatar-m me-2"><img class="avatar-img"
                                                                    src="data:<?php echo $app_fetch['c_pic_type']; ?>;base64,<?php echo base64_encode($app_fetch['c_pic']); ?>"
                                                                    alt="<?php echo $app_fetch['c_name']; ?>"></a>
                                                            <a
                                                                href="patient-profile.html" ><?php echo $app_fetch['c_name']; ?></a>
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        <div class="consult-type d-flex flex-column">
                                                            <h6 class="mb-0"><?php echo $app_fetch['cl_ques_title']; ?></h6>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="consult-type d-flex flex-column">
                                                            <h6 class="mb-0"><?php echo $app_fetch['cl_city']; ?></h6>
                                                          
                                                        </div>
                                                    </td>
                                                    <td class="text-center"><a class="call-status"
                                                            href="clients_details.php?id=<?php echo $app_fetch['b_id']; ?>">View Details</a></td>
                                                    
                                                </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
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

   