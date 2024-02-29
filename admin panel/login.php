<?php session_start();
 require "shared/config.php";

 
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];
  
  $sql="Select * from `admin` where email = '$email' && password = '$pass'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result) >0){
   
    $_SESSION['email']= $email;
    $_SESSION['password']=$pass;
    header("location:index.php");
  }else {
    echo "<div class='alert alert-danger' role='alert'>
    invalid!
  </div>";
  }
  
}


?>

<!-- // java for login  -->

<!-- <script>
 
if (email === "asmaatique348gmail.com" && pass === "admin123"){
  console.log("account logged in check status");
  if(status === "active"){
    alert("you are logged in sucessfully !");    
  }else{
    alert("status is not active");
  }
}else{
  alert("invalid ");
}
</script> -->

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:28 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>LAW NETWORK - Login</title>

<!-- css link bt 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 <link rel="shortcut icon"  href="img/law short logo.png">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/css/feather.css">

<link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
body {
  background-image: url('https://i.pinimg.com/originals/32/ae/0c/32ae0c356aa5da39ed571153319a5d7b.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
.btn :hover {
   background-color: whitesmoke;
}
.login-wrapper {
	width: 100%;
	height: 100vh;
	-webkit-box-align: left;
    -ms-flex-align: left;
    align-items: center;
	justify-content: center;
	display: -ms-flexbox;
	display: flex;
	flex-wrap: wrap;
    -webkit-flex-wrap: wrap;
}
.login-wrapper .loginbox {
	width: 100%;
	padding: 80px;
	max-width: 530px;
}
</style>
<body>
<div class="container  m-auto w-50">
<div class="main-wrapper">
<div class="header d-none">

<ul class="nav nav-tabs user-menu">

<li class="nav-item">
<a href="#" id="dark-mode-toggle" class="dark-mode-toggle">
<i class="feather-sun light-mode"></i><i class="feather-moon dark-mode"></i>
</a>
</li>

</ul>

</div>
<div class="row">
<div class="col-md-6 login-wrap-bg">

<div class="login-wrapper">
<div class="loginbox">
<div class="img-logo">
<!-- <img src="img/law network logo.png" class="img-fluid" alt="Logo"> -->
</div>
<h3 style="color:white; font-size:45px ;">Login</h3>
<form method="post">
<div class="form-group form-focus">
<input type="text" name="email" class="form-control floating">
<label class="focus-label">Enter Email</label>
</div>
<div class="form-group form-focus">
<input type="password" name="password" class="form-control floating">
<label class="focus-label">Enter Password</label>
</div>
<div class="form-group">
<div class="row">

<div class="d-grid">
<button class="btn btn-primary" type="submit" name="login" >Login</button>
</div>

</form>
</div>
</div>

</div>
</div>
</div>
</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:29 GMT -->
</html>