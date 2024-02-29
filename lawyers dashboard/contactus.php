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

// it's to add msg
if(isset($_POST['sendmsg'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['number'];
    $msg=$_POST['msg'];

    $insert="insert into contactus(con_name,con_email,con_phone,con_msg,con_from)values('$name','$email','$phone','$msg','lawyer')";
    $insert_run=mysqli_query($conn,$insert);

    $message="Your question is not inserted";
    if(!$insert_run){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else{
        echo "<script>
        alert('Mr/Ms ".$name.", Your form is inserted, We will get back to you soon through mail.');
        window.location.href = 'lawyers_dashboard.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
       Contactus - Law Network
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <style>
        .a-color{
            color:grey;
        }
    </style>
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
                            <li class="active"><a href="../law network user/index.php">Home</a></li>
                            <li class="active" aria-current="page">&nbsp; Contact Us</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Contact Us</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h3 class="mb-4">Contact Us</h3>
                    <p>If you have any query related our website, you can ask us we'll InshaAllah response you in Reasonable time.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex">
                    <div class="contact-box flex-fill">
                        <div class="infor-img">
                            <div class="image-circle">
                                <i class="feather-phone"></i>
                            </div>
                        </div>
                        <div class="infor-details text-center">
                            <label>Phone Number</label><br>
                            <a class="a-color" href="tel:03362456227">03362456227</a> <br>
<a class="a-color" href="tel:03221654896">03221654896</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="contact-box flex-fill">
                        <div class="infor-img">
                            <div class="image-circle bg-primary">
                                <i class="feather-mail"></i>
                            </div>
                        </div>
                        <div class="infor-details text-center">
                            <label>Email</label>
                            <p><a class="a-color" href="mailto:networklaw987@gmail.com"><span class="__cf_email__" data-cfemail="523b3c343d12372a333f223e377c313d3f">networklaw987@gmail.com</span> </a> <br>
<a class="a-color" href="mailto:lawnet123@gmail.com"><span class="__cf_email__" data-cfemail="6b181e1b1b04191f2b0e130a061b070e45080406">lawnet123@gmail.com</span></a>                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="contact-box flex-fill">
                        <div class="infor-img">
                            <div class="image-circle">
                                <i class="feather-map-pin"></i>
                            </div>
                        </div>
                        <div class="infor-details text-center">
                            <label>Location</label>
                            <p style="color:grey;">Plot A 575, Block 3 Gulshan-e-Iqbal, Karachi, Karachi City, Sindh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form">
        <div class="container">
            <div class="section-header text-center">
                <h2>Get in touch!</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Your Name <span>*</span></label>
                                    <input type="text" name="name" require required placeholder="Enter your name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Your Email <span>*</span></label>
                                    <input type="email" name="email" require required placeholder="Enter your email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Your Phone # <span>*</span></label>
                                    <input type="number" name="number" require required placeholder="Enter your Phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message <span>*</span></label>
                                    <input class="form-control" type="text" name="msg" style="line-height:7" required require placeholder="Your message">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="sendmsg" class="btn bg-secondary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-map d-flex">
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d904.5187569153555!2d67.09369325074596!3d24.929513867528538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3eb33f4acc92dbdf%3A0x59346e3d15b29f73!2sPlot%20A%20575%2C%20Block%203%20Gulshan-e-Iqbal%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!3m2!1d24.9291078!2d67.0939903!5e0!3m2!1sen!2s!4v1669808495516!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </section>


    <!-- footer start -->
    <?php
include '_shared/_footer.php';
?>


    <!-- footer-end -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>