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
        My clients
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
                                <li class="active" aria-current="page">My Clients</li>
</ol>
</nav>
<h2 class="breadcrumb-title">My Clients</h2>
</div>
</div>
</div>
</div>

<!-- sidebar start -->
<?php include '_shared/_sidebar.php'; ?>
<!-- sidebar end -->


    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="card card-table">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead class="table-warning">
                                            <tr>
                                                <th> </th>
                                                <th>Booking Id</th>
                                                <th>Client</th>
                                                <th>Complaint</th>
                                                <th>Date</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$cli_select="select * from appointments join clients_reg on clients_reg.c_id=appointments.c_id_FK where lawyer_id='$l_id' and status='approved'";
$cli_select_run=mysqli_query($conn,$cli_select);
while($cli_fetch=mysqli_fetch_array($cli_select_run)){
?>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="patient-profile.html" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="data:<?php echo $cli_fetch['c_pic_type']; ?>;base64,<?php echo base64_encode($cli_fetch['c_pic']); ?>" alt="User Image">
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td><?php echo $cli_fetch['b_id']; ?></td>
                                                <td><?php echo $cli_fetch['c_name']; ?></td>
                                                <td><?php echo $cli_fetch['cl_ques_title']; ?></td>
                                                <td><?php echo $cli_fetch['b_date']; ?></td>
                                                <td><a class="green-icon" href="clients_details.php?id=<?php echo $cli_fetch['b_id']; ?>"><i class="bi bi-eye"></i></a></td>
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
    <!-- footer start -->
    <?php
include '_shared/_footer.php';
?>

    
    <!-- footer-end -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
