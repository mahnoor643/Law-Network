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
                                <li class="active" aria-current="page">Reviews</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Reviews</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- sidebar start -->
    <?php include '_shared/_sidebar.php'; ?>
    <!-- sidebar end -->

    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="doc-review review-listing">

            <ul class="comments-list">
                <?php
$select_reviews="select * from lawyer_reviews  join clients_reg on lawyer_reviews.r_client_id=clients_reg.c_id join lawyer_reg on lawyer_reviews.r_lawyer_id=lawyer_reg.l_id where r_lawyer_id='$l_id'";
$select_reviews_run=mysqli_query($conn,$select_reviews);
while($review=mysqli_fetch_array($select_reviews_run)){
    $recommend_check=$review['recommend'];
?>
                <li>
                    <div class="comment">

                        <img class="avatar rounded-circle" alt="User Image"
                            src="data:<?php echo $review['c_pic_type']; ?>;base64,<?php echo base64_encode($review['c_pic']); ?>">
                        <div class="comment-body">
                            <div class="meta-data">
                                <span class="comment-author">
                                    <?php echo $review['c_name']; ?>
                                </span>
                                <span class="comment-date">Reviewed on
                                    <?php echo $review['review_time']; ?>
                                </span>

                            </div>

                            <?php
                    if($recommend_check=='Yes'){
                    ?>
                            <p class="recommended" style="color:green;"><i class="far fa-thumbs-up"></i> I recommend
                                <?php echo $review['l_name']; ?>
                            </p>
                            <?php
                    }else{
                    ?>
                            <p class="recommended" style="color:red;"><i class="far fa-thumbs-down"></i> I strictly
                                don't recommend
                                <?php echo $review['l_name']; ?>
                            </p>
                            <?php } ?>

                            <p class="comment-content">
                                <?php echo $review['review']; ?>
                            </p>
                            <div class="comment-reply">
                                <a class="comment-btn" onclick="myFunction()" href="JavaScript:Void(0);">
                                    <i class="fas fa-reply"></i> Reply
                                </a>
                            </div><br>

                        </div>
                    </div>
                    <ul class="comments-reply">

                        <?php
$reply_id=$review['rev_id'];
$select_replies="select * from review_reply join clients_reg on clients_reg.c_id=review_reply.rev_c_id_FK where rev_id_FK='$reply_id' and r_from='client'";
$select_replies_run=mysqli_query($conn,$select_replies);
if(mysqli_num_rows($select_replies_run)>0){

    while($replies=mysqli_fetch_array($select_replies_run)){
        
        ?>
                        <li>
                            <?php
$from=$replies['r_from'];
                            ?>
                            <div class="comment">
                                <img class="avatar rounded-circle" alt="User Image"
                                    src="data:<?php echo $replies['c_pic_type']; ?>;base64,<?php echo base64_encode($replies['c_pic']); ?>">
                                <div class="comment-body">
                                    <div class="meta-data">
                                        <span class="comment-author">
                                            <?php echo $replies['c_name']; ?>
                                        </span>
                                    </div>
                                    <p class="comment-content">
                                        <?php echo $replies['reply']; ?>
                                    </p>
                                   
                                </div>
                            </div>
                            <?php
                            }}
                                $select_lawyer_reply="select * from review_reply join lawyer_reg on lawyer_reg.l_id=review_reply.rev_l_id_FK where rev_id_FK='$reply_id' and r_from='lawyer'";
                                $select_lawyer_reply_run=mysqli_query($conn,$select_lawyer_reply);
                                if(mysqli_num_rows($select_lawyer_reply_run)>0){
                                while($l_reply=mysqli_fetch_array($select_lawyer_reply_run)){
                                ?>

                            <div class="comment">
                                <img class="avatar rounded-circle" alt="User Image"
                                    src="data:<?php echo $l_reply['l_pic_type']; ?>;base64,<?php echo base64_encode($l_reply['l_pic']); ?>">
                                <div class="comment-body">
                                    <div class="meta-data">
                                        <span class="comment-author">
                                            <?php echo $l_reply['l_name']; ?>
                                        </span>
                                    </div>
                                    <p class="comment-content">
                                        <?php echo $l_reply['reply']; ?>
                                    </p>
                                   
                                </div>
                            </div>

                            <?php

}}
                            ?>
                           
                        </li>
                        <div id="mydiv">
                                <!-- review adding sec -->

                                <div class="write-review">

                                    <form method="post">

                                        <div class="form-group">
                                            <label>Add a reply</label>
                                            <textarea id="review_desc" maxlength="100" name="reply"
                                                class="form-control"></textarea>
                                        </div>
                                        <br>
                                        <div class="submit-section">
                                            <button formaction="submitreply.php?id=<?php echo $review['rev_id']; ?>" type="submit" name="addreply"
                                                class="btn btn-secondary submit-btn">Reply</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                    
                    </ul>



                </li>
                <?php } ?>

            </ul>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <!-- footer-end -->

    <script>
        function myFunction() {
            var x = document.getElementById("mydiv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

   