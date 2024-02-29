<?php
session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
if(isset($email)&& isset($pass)){
 }
 else {
  header('location:../law network user/clients_login.php');
 }
 include "../admin panel/shared/config.php";

error_reporting(0);

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
  <title>Edit Profile - Law Network</title>
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


<section class="h-100 h-custom" style="background-color: #f5f5ef;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="assets/images/bg/breadcrumb-bg.png" class="w-100"
              style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
            <div style="background-color:#b69d74;" class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Edit Your Profile</h3>

              <!-- Browser Default Validation -->
              
              <form class="container" method="post" enctype="multipart/form-data">
                <div class="col">
                  <label for="validationDefault01" class="form-label">Full name</label>
                  <input type="text" name="name" class="form-control" id="validationDefault01" value="<?php echo  $select_fetch['c_name']; ?>" required>
                </div>
                <br>
                <div class="col">
                  <label for="validationDefault02" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="validationDefault02" value="<?php echo  $select_fetch['c_email']; ?>" required>
                </div><br>
                <div class="col">
                  <input type="file"  name="img" class="form-control" aria-label="file example" >
                </div><br>
                <div class="col">
                  <label for="validationDefault01" class="form-label">Password</label>
                  <input type="text"  value="<?php echo  $select_fetch['c_pass']; ?>" name="pass" onChange="onChange()" class="form-control" id="validationDefault01"
                    required>
                </div>
                <div class="col">
                  <label for="validationDefault01" class="form-label">Re-type password</label>
                  <input type="text" value="<?php echo  $select_fetch['c_pass']; ?>" onChange="onChange()" name="r-pass" class="form-control"
                    id="validationDefault01" required>
                </div><br>
                <div class="col">
                  <button class="btn btn-primary" name="submit" type="submit">Make changes</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function onChange() {
      const password = document.querySelector('input[name=pass]');
      const confirm = document.querySelector('input[name=r-pass]');
      if (confirm.value === password.value) {
        confirm.setCustomValidity('');
      } else {
        confirm.setCustomValidity('Passwords do not match');
      }
    }
  </script>
  <!-- End Browser Default Validation -->

  <?php
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['r-pass'];
  $img_tmp=$_FILES['img']['tmp_name'];
  $img_name=$_FILES['img']['name'];
  $img_type=$_FILES['img']['type'];
  $target_folder="assets/images/clients profile/";
  $message="Your changes are not saved";
  $msg="Your changes have been saved succesfully";
  
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

  if(empty($img_tmp)==true){
    $update_withoutimg="update clients_reg set c_name='$name' , c_email='$email', c_pass='$pass' where c_id='$id'";
    $update_run=mysqli_query($conn,$update_withoutimg);
  }else {
  $update="update clients_reg set c_name='$name' , c_email='$email', c_pass='$pass', c_pic='$add_img',c_pic_type='$img_type' where c_id='$id'";
  $update_run=mysqli_query($conn,$update);}

  if(!$update_run){
    echo "<script type='text/javascript'>alert('$message');</script>";
  }else{
    echo "<script type='text/javascript'>alert('$msg');
      document.location = 'clients_login.php'
    </script>";
  }

}
?>

<!-- it's footer -->
<?php
include '_shared/_footer.php';
?>