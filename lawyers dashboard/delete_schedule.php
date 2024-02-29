<?php
$id=$_GET['id'];
include "../admin panel/shared/config.php";
$message="Your schedule is not deleted";
$delete_schedule="delete from schedule_time where sch_time_id='$id'";
$delete_schedule_run=mysqli_query($conn,$delete_schedule);
if(!$delete_schedule_run){
    echo "<script type='text/javascript'>alert('$message');</script>";
}else{
    header('location:schedule-time.php');
}
?>