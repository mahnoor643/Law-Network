<?php
$id=$_GET['id'];
include "../admin panel/shared/config.php";
$message="Your status have not been changed yet";
$update_approve="update appointments set status='approved' where b_id='$id'";
$update_approve_run=mysqli_query($conn,$update_approve);
if(!$update_approve_run){
    echo "<script type='text/javascript'>alert('$message');</script>";
}else {
    echo "<script>
      window.location.href = 'my_appointments.php';
      alert('Appointment accepted');
</script>";
}
?>