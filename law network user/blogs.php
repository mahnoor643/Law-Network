<?php 
require "../admin panel/shared/config.php";
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


$fetch_law="select * from lawyer_reg where l_status=0";
$fetch_law_run=mysqli_query($conn,$fetch_law);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - Law Network</title>
    <style>
        .search-style{
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
    background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/images/blogs.jpg');
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
                    Blogs
                    </h2>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="team-section pt-120">
        <div class="container">
            <div class="row justify-content-center mb-60">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10">
                    <div class="section-title2 text-center">
                        <span><b>Blogs</b></span>
                        <h3>Get knowledge by go throughing these updated articles.</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center g-4 mb-60">

            <?php
$select_blog="select * from blog";
$select_blog_run=mysqli_query($conn,$select_blog);
while($blog_f=mysqli_fetch_array($select_blog_run)){
?>

                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10 wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                     <div class="l-news-single">
                        <img src="data:<?php echo $blog_f['blog_image_type']; ?>;base64,<?php echo base64_encode($blog_f['blog_image']); ?>" class="casestudy1" alt="image">
                        <div class="text">
                           <h4><a href="blog_details.php?id=<?php echo $blog_f['blog_id']; ?>"><?php echo $blog_f['blog_tittle']; ?></a>
                           </h4>
                        </div>
                     </div>
                  </div>
                  
<?php } ?>

</div>
            </div>
            </div>

              <!-- it's footer -->
    <?php
include '_shared/_footer.php';
?>
            