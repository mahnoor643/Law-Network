<?php
error_reporting(0);
 include "../admin panel/shared/config.php";

session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
if(isset($email)&& isset($pass)){
 }
 else {
  header('location:../law network user/clients_login.php');
 }



$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Appointments - Law Network</title>
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
<?php
include '_shared/_header.php';
?>

<!-- header end -->

<div class="container page-set" style="background-color:white;">
 
<h2 class="d-flex justify-content-start">My Appointments</h2>
<div class="d-flex justify-content-end">
                <div class="btn btn-c">
                    <a href="appointment.php"><i class="fa fa-plus"></i>&nbsp; Add Appointment</a>
                </div>
            </div><br><br>
<table class="table">
  <thead>
    <tr>
      <th> </th>
      <th scope="col">Lawyer</th>
      <th scope="col">Lawyer's Number</th>
      <th scope="col">Complaint</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $all_appointments="select * from appointments join lawyer_reg on appointments.lawyer_id=lawyer_reg.l_id where c_id_FK='$id'";
    $all_appointments_run=mysqli_query($conn,$all_appointments);
    while($all_app_fet=mysqli_fetch_array($all_appointments_run)){
    ?>
    <tr class="height-set">
      <td scope="row"><img width="40" height="40" class="rounded-circle" src="data:<?php echo $all_app_fet['l_pic_type']; ?>;base64,<?php echo base64_encode($all_app_fet['l_pic']); ?>"
          alt="<?php echo $all_app_fet['l_name']; ?>"></td>
      <td><?php echo $all_app_fet['l_name']; ?></td>
      <td><?php echo $all_app_fet['l_num']; ?></td>
      <td><?php echo $all_app_fet['cl_ques_title']; ?></td>
      <td><?php echo $all_app_fet['b_date']; ?></td>
      <td><?php echo $all_app_fet['status']; ?></td>
      <td><a class="blue-icon" href="attorney-details.php?id=<?php echo $all_app_fet['l_id']; ?>"><i class="bi bi-eye"></i></a>
    <a class="red-icon" href="delete_appointment.php?id=<?php echo $all_app_fet['b_id']; ?>"><i class="bi bi-trash"></i></a>
    <a class="green-icon" href="appointment_edit.php?id=<?php echo $all_app_fet['b_id']; ?>"><i class="bi bi-pen"></i></a>
    </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>

<!-- it's footer -->
<?php
include '_shared/_footer.php';
?>