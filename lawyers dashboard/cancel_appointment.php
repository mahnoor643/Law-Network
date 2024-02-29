<?php
$id=$_GET['id'];
include "../admin panel/shared/config.php";
$message="Your status have not been changed yet";
$update_cancel="update appointments set status='cancelled' where b_id='$id'";
$update_cancel_run=mysqli_query($conn,$update_cancel);
if(!$update_cancel_run){
    echo "<script type='text/javascript'>alert('$message');</script>";
}else {
    echo "<script>
    window.location.href = 'my_appointments.php';
    alert('Appointment cancelled');
</script>";
}
?>