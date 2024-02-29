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


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $l_email=$_POST['email'];
    $degree=$_POST['degree'];
    $uni=$_POST['uni'];
    $expertise=$_POST['expertise'];
    $case_won=$_POST['case_won'];
    $case_lost=$_POST['case_lost'];
    $experience=$_POST['experience'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $img_name=$_FILES['img']['name'];
    $img_type=$_FILES['img']['type'];
    $target_folder="../law network user/assets/images/lawyer profile/";
    
    $allowed_ext=array('png','jpeg','jpg','gif','jfif');
    $ext=explode('.',$img_name);
    $img_ext=strtolower(end($ext));
    if(in_array($img_ext,$allowed_ext)==false){
       $error[]="not required extention";
    }
    if(empty($error)==true){
       $add_img=addslashes(file_get_contents($img_tmp));
       move_uploaded_file($img_tmp,$target_folder.$img_name);
    }
    $num=$_POST['number'];
    $city=$_POST['city'];
    $address=$_POST['address'];
    $details=$_POST['details'];
    $password=$_POST['password'];
    if(empty($img_tmp)==true){
        $update="update lawyer_reg set l_name='$name', l_email='$l_email', pass ='$password' ,address='$address', city='$city', l_num='$num', degree='$degree',  uni_clg='$uni', expertise='$expertise', l_status=0, details='$details' , case_won='$case_won', case_lost='$case_lost', experience='$experience' where l_id='$l_id'";
        $update_run=mysqli_query($conn,$update);
    }else{
        $update="update lawyer_reg set l_name='$name', l_email='$l_email', l_pic='$add_img', address='$address', city='$city', l_num='$num', degree='$degree',  uni_clg='$uni', expertise='$expertise', l_status=0, details='$details' , l_pic_type='$img_type', case_won='$case_won', case_lost='$case_lost', experience='$experience' where l_id='$l_id'";
        $update_run=mysqli_query($conn,$update);
    }
   
    $message="Account changes failed";

    if(!$update_run){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
        echo "<script>
        window.location.href = '../law network user/lawyer_login.php';
        alert('Account settings updated');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        <?php echo $row['l_name']; ?>'s profile edit
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
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
                                <li class="active" aria-current="page">Profile Settings</li>
                            </ol>
                        </nav>
                        <h2 class="breadcrumb-title">Profile Settings</h2>
                    </div>
                </div>
            </div>
        </div>


        <!-- sidebar start -->
<?php include '_shared/_sidebar.php'; ?>
<!-- sidebar end -->


<div class="col-md-7 col-lg-8 col-xl-9">

<!-- form starts from here -->

<form method="post" enctype="multipart/form-data">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Basic Information</h4>
        <div class="row form-row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="change-avatar">
                        <div class="profile-img">
                            <img src="data:<?php echo $row['l_pic_type']; ?>;base64,<?php echo base64_encode($row['l_pic']); ?>" width="31"
                                    alt="<?php echo $row['l_name']; ?>">
                        </div>
                        <div class="upload-img">
                            <div class="change-photo-btn">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file"  name="img"  class="upload">
                            </div>
                            <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max
                                size of 2MB</small><br>
                                <small class="form-text text-muted">Upload and save changes then it will updated automatically.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Full name <span class="text-danger">*</span></label>
                    <input type="text" required require  name="name" value="<?php echo $row['l_name']; ?>" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email"  required require name="email" value="<?php echo $row['l_email']; ?>"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label> <i onmousedown="show()" onmousemove="hide()" class="bi bi-eye-fill"></i>
                    <input type="password" id="pass"  required require name="password" value="<?php echo $row['pass']; ?>"  class="form-control">
                </div>
            </div>
            <script>
                function show() {
                    document.getElementById('pass').setAttribute('type','text');
                }
                function hide() {
                    document.getElementById('pass').setAttribute('type','password');
                }
            </script>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone # <span class="text-danger">*</span></label>
                    <input type="number" required require  name="number" value="<?php echo $row['l_num']; ?>"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Address <span class="text-danger">*</span></label>
                    <input type="text" required require  name="address" value="<?php echo $row['address']; ?>"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>City <small class="text-danger">*</small></label>
                    <select  name="city" value="<?php echo $row['city']; ?>"  class="form-control">
                    <?php
                                    $city="select * from city";
                                    $city_run=mysqli_query($conn,$city);
                                    while($fetch_city=mysqli_fetch_array($city_run)){
                                    ?>
                                        <option value="<?php echo $fetch_city['city']; ?>"><?php echo $fetch_city['city']; ?></option>
                                          <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Degree  <span class="text-danger">*</span></label>
                    <select name="degree" value="<?php echo $row['degree']; ?>"  class="form-control">
                    <?php
                                    $degree="select * from l_degree";
                                    $degree_run=mysqli_query($conn,$degree);
                                    while($fetch_deg=mysqli_fetch_array($degree_run)){
                                    ?>
                                        <option value="<?php echo $fetch_deg['degree']; ?>"><?php echo $fetch_deg['degree']; ?></option>
                                          <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Clg/Uni name <span class="text-danger">*</span></label>
                    <input type="text" name="uni" required require  value="<?php echo $row['uni_clg']; ?>"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Expertise  <span class="text-danger">*</span></label>
                    <select  name="expertise"  value="<?php echo $row['expertise']; ?>" class="form-control">
                    <?php
                                    $exp="select * from l_expertise";
                                    $expertise_run=mysqli_query($conn,$exp);
                                    while($fetch_exp=mysqli_fetch_array($expertise_run)){
                                    ?>
                                        <option value="<?php echo $fetch_exp['l_expertise']; ?>"><?php echo $fetch_exp['l_expertise']; ?></option>
                                          <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Experience <span class="text-danger">*</span></label>
                    <input type="text" name="experience" required require  value="<?php echo $row['experience']; ?>"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Case won <span class="text-danger">*</span></label>
                    <input type="number" name="case_won" required require  value="<?php echo $row['case_won']; ?>"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Case lost <span class="text-danger">*</span></label>
                    <input type="number" name="case_lost" required require  value="<?php echo $row['case_lost']; ?>"  class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <h4 class="card-title">About Me</h4>
        <div class="form-group mb-0">
            <label>Something about yourself</label>
            <input class="form-control" style="line-height:4" required require name="details" value="<?php echo $row['details']; ?>">
        </div>
    </div>
</div>


<div class="submit-section submit-btn-bottom">
    <button type="submit" name="submit" class="btn btn-primary submit-btn">Save Changes</button>
</div>
</form>
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

    