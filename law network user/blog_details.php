<?php 
$blog_id=$_GET['id'];
include "../admin panel/shared/config.php";

error_reporting(0);

// it's for header switching if logined
session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);
// end 
$select_blog_det="select  * from blog  where blog_id='$blog_id'";
$select_blog_det_run=mysqli_query($conn,$select_blog_det);
$blogfetch=mysqli_fetch_array($select_blog_det_run);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Blog - Law Network</title>
    <style>
        .search-style {
            width: 30%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #f5f5ef;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .parallax {
    background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/images/blog details.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    padding: 12.5rem 0px;
  }
    </style>
    <?php include '_shared/_header.php'; ?>

  <!-- it's label div -->
  <div class="parallax">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-lg-6">
                    <h2 class="breadcrumb-title wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s">
                    Blog details
                    </h2>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <div class="container p-5">
        <div class="row">



            <div class="col-8">
                <h2 class="d-flex justify-content-center">
                    <?php echo $blogfetch['blog_tittle']; ?>
                </h2><br>
                <img src="data:<?php echo $blogfetch['blog_image_type']; ?>;base64,<?php echo base64_encode($blogfetch['blog_image']); ?>"
                    alt="" class="img-fluid m-3">
                <p class="m-4 p-3">
                    <?php echo $blogfetch['blog_here']; ?>
                </p>
            </div>

            <div class="col-4">
                <?php
        $select_all_blogs="select * from blog";
        $select_all_blogs_run=mysqli_query($conn,$select_all_blogs);
        while($row=mysqli_fetch_array($select_all_blogs_run)){
        ?>
        <div class="div p-5">
                <div class="post-entry-1 border-bottom">
                    
                    <h3 class="mb-2"><a href="blog_details.php?id=<?php echo $row['blog_id']; ?>"><?php echo $row['blog_tittle']; ?></a></h3>
                    
                </div></div>
                <?php
        }
        ?>
            </div>

        </div>
    </div>




    <!-- it's footer -->
    <?php
include '_shared/_footer.php';
?>