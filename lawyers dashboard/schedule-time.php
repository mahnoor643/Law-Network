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

// inserting schedule for sunday
if(isset($_POST['sunsubmit'])){
    $sun_start_time=$_POST['sunstarttime'];
    $sun_end_time=$_POST['sunendtime'];
$insert_sun="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','sunday','$sun_start_time','$sun_end_time')";
$insert_sun_run=mysqli_query($conn,$insert_sun);
}
// inserting schedule for monday
if(isset($_POST['monsubmit'])){
    $mon_start_time=$_POST['monstarttime'];
    $mon_end_time=$_POST['monendtime'];
$insert_mon="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','monday','$mon_start_time','$mon_end_time')";
$insert_mon_run=mysqli_query($conn,$insert_mon);
}
// inserting schedule for tuesday
if(isset($_POST['tuessubmit'])){
    $tues_start_time=$_POST['tuesstarttime'];
    $tues_end_time=$_POST['tuesendtime'];
$insert_tues="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','tuesday','$tues_start_time','$tues_end_time')";
$insert_tues_run=mysqli_query($conn,$insert_tues);
}
// inserting schedule for wednesday
if(isset($_POST['wedsubmit'])){
    $wed_start_time=$_POST['wedstarttime'];
    $wed_end_time=$_POST['wedendtime'];
$insert_wed="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','wednesday','$wed_start_time','$wed_end_time')";
$insert_wed_run=mysqli_query($conn,$insert_wed);
}
// inserting schedule for thursday
if(isset($_POST['thurssubmit'])){
    $thurs_start_time=$_POST['thursstarttime'];
    $thurs_end_time=$_POST['thursendtime'];
$insert_thurs="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','thursday','$thurs_start_time','$thurs_end_time')";
$insert_thurs_run=mysqli_query($conn,$insert_thurs);
}
// inserting schedule for friday
if(isset($_POST['frisubmit'])){
    $fri_start_time=$_POST['fristarttime'];
    $fri_end_time=$_POST['friendtime'];
$insert_fri="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','friday','$fri_start_time','$fri_end_time')";
$insert_fri_run=mysqli_query($conn,$insert_fri);
}
// inserting schedule for saturday
if(isset($_POST['satsubmit'])){
    $sat_start_time=$_POST['satstarttime'];
    $sat_end_time=$_POST['satendtime'];
$insert_sat="insert into schedule_time(l_id_FK , sch_day , start_time , end_time)value('$l_id','saturday','$sat_start_time','$sat_end_time')";
$insert_sat_run=mysqli_query($conn,$insert_sat);
}
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

    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                        <li class="active"><a href="../law network user/index.php"> Home &nbsp;</a></li>
                                <li class="active" aria-current="page">Schedule Timings</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Schedule Timings</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar start -->
    <?php include '_shared/_sidebar.php'; ?>
    <!-- sidebar end -->


    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Schedule Timings</h4>
                        <div class="profile-box">
                  
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card schedule-widget mb-0">

                                        <div class="schedule-header">

                                            <div class="schedule-nav">
                                                <ul class="nav nav-tabs nav-justified">
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#slot_sunday">Sunday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                            href="#slot_monday">Monday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#slot_tuesday">Tuesday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#slot_wednesday">Wednesday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#slot_thursday">Thursday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#slot_friday">Friday</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#slot_saturday">Saturday</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>


                                        <div class="tab-content schedule-cont">


                                            <div id="slot_sunday" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal" href="#sunday_time_slot"><i
                                                            class="fa fa-plus-circle"></i> Add Slot</a>
                                                </h4>
                                                <?php
$select_shedule="select * from schedule_time where sch_day='sunday' and l_id_FK='$l_id'";
$select_shedule_run=mysqli_query($conn,$select_shedule);
if(mysqli_num_rows($select_shedule_run)>0){
    echo "<div class='doc-times'>";
    while($row_run=mysqli_fetch_array($select_shedule_run)){
        $row_delete=$row_run['sch_time_id'];
echo "
<div class='doc-slot-list'>" . $row_run['start_time'] . " - " . $row_run['end_time'] .
"<a href='delete_schedule.php?id=$row_delete' class='delete_schedule'>
<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
}
?>
                                            </div>


                                            <div id="slot_monday" class="tab-pane fade show active">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal"
                                                        href="#monday_time_slot"><i class="fa fa-plus-circle"></i>Add Slot</a>
                                                </h4>

                                                <?php
$select_shedule_mon="select * from schedule_time where sch_day='monday' and l_id_FK='$l_id'";
$select_shedule_mon_run=mysqli_query($conn,$select_shedule_mon);
if(mysqli_num_rows($select_shedule_mon_run)>0){
    echo "<div class='doc-times'>";
    while($mon_run=mysqli_fetch_array($select_shedule_mon_run)){
        $mon_delete=$mon_run['sch_time_id'];
echo "
<div class='doc-slot-list'>" . $mon_run['start_time'] . " - " . $mon_run['end_time'] .
"<a href='delete_schedule.php?id=$mon_delete' class='delete_schedule'>
<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
}
?>

                                            </div>


                                            <div id="slot_tuesday" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal" href="#tuesday_time_slot"><i
                                                            class="fa fa-plus-circle"></i> Add Slot</a>
                                                </h4>
                                                <?php
$select_shedule_tues="select * from schedule_time where sch_day='tuesday' and l_id_FK='$l_id'";
$select_shedule_tues_run=mysqli_query($conn,$select_shedule_tues);
if(mysqli_num_rows($select_shedule_tues_run)>0){
    echo "<div class='doc-times'>";
    while($tues_run=mysqli_fetch_array($select_shedule_tues_run)){
        $tues_delete=$tues_run['sch_time_id'];
echo "
<div class='doc-slot-list'>" . $tues_run['start_time'] . " - " . $tues_run['end_time'] .
"<a href='delete_schedule.php?id=$tues_delete' class='delete_schedule'>
<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
}
?>
                                            </div>


                                            <div id="slot_wednesday" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal" href="#wednesday_time_slot"><i
                                                            class="fa fa-plus-circle"></i> Add Slot</a>
                                                </h4>
                                                <?php
$select_shedule_wed="select * from schedule_time where sch_day='wednesday' and l_id_FK='$l_id'";
$select_shedule_wed_run=mysqli_query($conn,$select_shedule_wed);
if(mysqli_num_rows($select_shedule_wed_run)>0){
    echo "<div class='doc-times'>";
    while($wed_run=mysqli_fetch_array($select_shedule_wed_run)){
        $wed_delete=$wed_run['sch_time_id'];
echo "
<div class='doc-slot-list'>" . $wed_run['start_time'] . " - " . $wed_run['end_time'] .
"<a href='delete_schedule.php?id=$wed_delete' class='delete_schedule'>
<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
}
?>
                                            </div>


                                            <div id="slot_thursday" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal" href="#thursday_time_slot"><i
                                                            class="fa fa-plus-circle"></i> Add Slot</a>
                                                </h4>
                                                <?php
$select_shedule_thurs="select * from schedule_time where sch_day='thursday' and l_id_FK='$l_id'";
$select_shedule_thurs_run=mysqli_query($conn,$select_shedule_thurs);
if(mysqli_num_rows($select_shedule_thurs_run)>0){
    echo "<div class='doc-times'>";
    while($thurs_run=mysqli_fetch_array($select_shedule_thurs_run)){
        $thurs_delete=$thurs_run['sch_time_id'];

echo "
<div class='doc-slot-list'>" . $thurs_run['start_time'] . " - " . $thurs_run['end_time'] .
"<a href='delete_schedule.php?id=$thurs_delete' class='delete_schedule'>
<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
}
?>
                                            </div>


                                            <div id="slot_friday" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal" href="#friday_time_slot"><i
                                                            class="fa fa-plus-circle"></i> Add Slot</a>
                                                </h4>
                                                <?php
$select_shedule_fri="select * from schedule_time where sch_day='friday' and l_id_FK='$l_id'";
$select_shedule_fri_run=mysqli_query($conn,$select_shedule_fri);
if(mysqli_num_rows($select_shedule_fri_run)>0){
    echo "<div class='doc-times'>";
    while($fri_run=mysqli_fetch_array($select_shedule_fri_run)){
        $fri_delete=$fri_run['sch_time_id'];
echo "
<div class='doc-slot-list'>" . $fri_run['start_time'] . " - " . $fri_run['end_time'] .
"<a href='delete_schedule.php?id=$fri_delete' class='delete_schedule'>
<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
}
?>
                                            </div>


                                            <div id="slot_saturday" class="tab-pane fade">
                                                <h4 class="card-title d-flex justify-content-between">
                                                    <span>Time Slots</span>
                                                    <a class="edit-link" data-bs-toggle="modal" href="#saturday_time_slot"><i
                                                            class="fa fa-plus-circle"></i> Add Slot</a>
                                                </h4>
                                                <?php
$select_shedule_sat="select * from schedule_time where sch_day='saturday' and l_id_FK='$l_id'";
$select_shedule_sat_run=mysqli_query($conn,$select_shedule_sat);
if(mysqli_num_rows($select_shedule_sat_run)>0){
    echo "<div class='doc-times'>";
    while($sat_run=mysqli_fetch_array($select_shedule_sat_run)){
        $sat_delete=$sat_run['sch_time_id'];
echo "
<div class='doc-slot-list'>" . $sat_run['start_time'] . " - " . $sat_run['end_time'] .
" <a href='delete_schedule.php?id=$sat_delete' class='delete_schedule'> " . " " .
"<i class='fa fa-times'></i>
</a>
</div>
";
    }echo "</div>";
}else{
    echo "<p class='text-muted mb-0'>Not Available</p>";
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

    </div>
    <!-- footer-end -->

    <!-- module for sunday -->

    <div class="modal fade custom-modal" id="sunday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="sunstarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="sunendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="submit-section text-center">
                            <button type="submit" name="sunsubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


 <!-- module for monday -->

 <div class="modal fade custom-modal" id="monday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="monstarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="monendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="submit-section text-center">
                            <button type="submit" name="monsubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


 <!-- module for tuesday -->

 <div class="modal fade custom-modal" id="tuesday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="tuesstarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="tuesendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="submit-section text-center">
                            <button type="submit" name="tuessubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


 <!-- module for wednesday -->

 <div class="modal fade custom-modal" id="wednesday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="wedstarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="wedendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="submit-section text-center">
                            <button type="submit" name="wedsubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


 <!-- module for thursday -->

 <div class="modal fade custom-modal" id="thursday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="thursstarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="thursendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="submit-section text-center">
                            <button type="submit" name="thurssubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- module for friday -->

     <div class="modal fade custom-modal" id="friday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="fristarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="friendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="submit-section text-center">
                            <button type="submit" name="frisubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


 <!-- module for saturday -->

 <div class="modal fade custom-modal" id="saturday_time_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Time Slots</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="hours-info">
                            <div class="row form-row hours-cont">
                                <div class="col-12 col-md-10">
                                    <div class="row form-row">
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Start Time</label>
                                                <select name="satstarttime" class="form-select form-control">
                                                    <option>11:00 am</option>
                                                    <option>12:00 am</option>
                                                    <option>01:00 pm</option>
                                                    <option>02:00 pm</option>
                                                    <option>03:00 pm</option>
                                                    <option>04:00 pm</option>
                                                    <option>05:00 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>End Time</label>
                                                <select name="satendtime" class="form-select form-control">
                                                    <option>11:30 am</option>
                                                    <option>12:30 am</option>
                                                    <option>01:30 pm</option>
                                                    <option>02:30 pm</option>
                                                    <option>03:30 pm</option>
                                                    <option>04:30 pm</option>
                                                    <option>05:30 pm</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="submit-section text-center">
                            <button type="submit" name="satsubmit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
