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

// it's for adding review for website
$message="your review is not added";
if(isset($_POST['addreview'])){
    $web_review=$_POST['lwebsitereview'];
    $insert_website_review="insert into website_review(webrev_from,webrev_l_id,web_review,webrev_status)values('lawyer','$l_id','$web_review',1)";
    $insert_website_review_run=mysqli_query($conn,$insert_website_review);
    if(!$insert_website_review_run){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }else {
        echo "<script>
            window.location.href = 'lawyers_dashboard.php';
            alert('Thanks for giving us time, your review is added.');
        </script>";
    }
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
                            <li class="active"><a href="../law network user/index.php">Home</a></li>
                            <li class="active" aria-current="page">&nbsp; Write Review</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Write Review</h2>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-form">
        <div class="container">
            <div class="section-header text-center">
                <h2>Write something about us</h2>
            </div>
            <div class="row p-5 m-5">
                <div class="col-md-12">
                    <form method="post">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tell something about us <span>*</span></label>
                                    <input class="form-control" style="line-height:4" required require
                                        name="lwebsitereview">


                                </div>
                            </div>
                        </div>
                        <button class="btn bg-secondary" type="submit" name="addreview">Add Review</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer start -->
    <?php
include '_shared/_footer.php';
?>

    </div>
    <!-- footer-end -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>