<?php
$id=$_GET['id'];
include "../admin panel/shared/config.php";


$select="select * from appointments where b_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_run_fetch=mysqli_fetch_array($select_run);
$status=$select_run_fetch['status'];

$message="Your appointment is not deleted";
if($status=='waiting'){
    $delete_cancel="delete from appointments where b_id='$id'";
    $delete_cancel_run=mysqli_query($conn,$delete_cancel);
    if(!$delete_cancel_run){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else {
        echo "<script>
        window.location.href = 'my_appointment.php';
        alert('Appointment deleted');
    </script>";
    }
}else{
    echo "<script>
    alert('Appointment ".$status.", You can\' t delete it now.');
    window.location.href = 'my_appointment.php';
</script>";

}

?>