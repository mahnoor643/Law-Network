<?php 
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

$l_id=$_GET['id'];
$fetch_law_id="select * from lawyer_reg where l_id='$l_id'";
$fetch_law_id_run=mysqli_query($conn,$fetch_law_id);
$row_id=mysqli_fetch_array($fetch_law_id_run);

if(isset($_POST['addreview'])){
    $review_title=$_POST['review-title'];
    $review=$_POST['review'];
    $recommend=$_POST['options'];

    $insert_review="insert into lawyer_reviews(review_title , review , r_lawyer_id, r_client_id, recommend) values('$review_title','$review','$l_id', '$id' ,'$recommend')";
    $insert_review_run=mysqli_query($conn,$insert_review);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $row_id['l_name']; ?>
    </title>
    <style>
        .review-button {
            padding: 3px;
            font-size: 12px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .parallax {
    background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/images/law2.jpg');
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
                        <?php echo $row_id['l_name']; ?>
                    </h2>
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>




    <!-- profile starts from here -->
    <div class="lawyer-details-section pt-120 pb-120">
        <div class="container">
            <div class="lawyer-info">
                <div class="row justify-content-center gy-5">
                    <div class="col-xl-5 text-xl-start text-center">
                        <img src="data:<?php echo $row_id['l_pic_type']; ?>;base64,<?php echo base64_encode($row_id['l_pic']); ?>"
                            class="img-fluid rounded-2" alt="image">
                    </div>
                    <div class="col-xl-7">
                        <div class="lawyer-profile text-xl-start text-center">
                            <h2>Profile</h2>
                            <b>Expertise: </b> <span>
                                <?php echo $row_id['expertise']; ?>
                            </span>
                            <p class="para">
                                <?php echo $row_id['details']; ?>
                            </p>
                            <br>
                            <p class="para">I've completed my
                                <?php echo $row_id['degree']; ?> degree from
                                <?php echo $row_id['uni_clg']; ?>
                            </p>
                            <div class="lawyer-counter">
                                <div class="row g-4 d-flex justify-content-xl-start justify-content-center">
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-3 col-6 text-start d-flex justify-content-xl-start justify-content-center">
                                        <div class="lawyer-counter-single">
                                            <div class="coundown d-flex flex-column">
                                                <h3 class="odometer"
                                                    data-odometer-final="<?php echo $row_id['case_won']; ?>">1</h3>
                                                <h5>Case Won</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-3 col-6 text-start d-flex justify-content-xl-start justify-content-center">
                                        <div class="lawyer-counter-single">
                                            <div class="coundown d-flex flex-column">
                                                <h3 class="odometer"
                                                    data-odometer-final="<?php echo $row_id['case_lost']; ?>">1</h3>
                                                <h5>Case Lost</h5>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="lawyer-short-details">
                                <h4>Short Details</h4>

                                <ul class="details-list">

                                    <li>
                                        <span>Experience: </span>
                                        <h5>
                                            <?php echo $row_id['experience']; ?>
                                        </h5>
                                    </li>
                                    <li>
                                        <span>Email: </span>
                                        <h5><a href="mailto:mahnoort643@gmail.com , <?php echo $row_id['l_email']; ?>"
                                                class="__cf_email__" data-cfemail="177e79717857726f767a677b723974787a">
                                                <?php echo $row_id['l_email']; ?>
                                            </a>
                                        </h5>
                                    </li>
                                    <li>
                                        <span>Nationality: </span>
                                        <h5>Pakistani</h5>
                                    </li>

                                    <li>
                                        <span>Address:</span>
                                        <h5>
                                            <?php echo $row_id['address']; ?>
                                        </h5>
                                    </li>
                                    <li>
                                        <span>City: </span>
                                        <h5>
                                            <?php echo $row_id['city']; ?>
                                        </h5>
                                    </li>
                                    <li>
                                        <span>Phone number: </span>
                                        <h5>
                                            <?php echo $row_id['l_num']; ?>
                                        </h5>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-xl d-block">
                <div class="eg-btn rounded btn--primary btn--lg d-xl ">
                    <a href="selected_lawyer_appointment.php?id=<?php echo $row_id['l_id']; ?>">Book Appointment</a>
                </div>
            </div>

        </div>
    </div>

    <!-- review section starts from here -->

    <div class="container mb-3">
        <div class="comments-list border rounded p-4">

        <ul>
        <?php
        $recommending_lawyer_id=$row_id['l_id'];
        $select_review="select * from lawyer_reviews join clients_reg on lawyer_reviews.r_client_id=clients_reg.c_id join lawyer_reg on lawyer_reviews.r_lawyer_id=lawyer_reg.l_id where l_id='$recommending_lawyer_id'";
        $select_review_run=mysqli_query($conn,$select_review);
        while($review_fetch=mysqli_fetch_array($select_review_run)){
            $recommend_check=$review_fetch['recommend'];
        ?>
            <div class="comment ">
                <img width="50" height="50" class="rounded-circle" alt="User Image" src="data:<?php echo $review_fetch['c_pic_type']; ?>;base64,<?php echo base64_encode($review_fetch['c_pic']); ?>">
                <div class="comment-body m-3">
                    <div class="meta-data"style="display: inline-block;">
                        <span><b><?php echo $review_fetch['c_name']; ?></b></span><br>
                        <span>Reviewed on <?php echo $review_fetch['review_time']; ?></span><br>
                    </div><br>
                    <?php
                    if($recommend_check=='Yes'){
                    ?>
                    <p class="recommended" style="color:green;"><i class="far fa-thumbs-up"></i> I recommend <?php echo $review_fetch['l_name']; ?></p>
                    <?php
                    }else{
                    ?>
                    <p class="recommended" style="color:red;"><i class="far fa-thumbs-down"></i> I strictly don't recommend <?php echo $review_fetch['l_name']; ?></p>
                    <?php } ?>
                    <p class="comment-content">
                    <?php echo $review_fetch['review']; ?>
                    </p>
                    <div class="comment-reply">
                                <a class="comment-btn" onclick="myReply()" href="JavaScript:Void(0);">
                                    <i class="fas fa-reply"></i> Reply
                                </a>
                            </div>
                </div>

                <ul class="comments-reply">

<?php
$reply_id=$review_fetch['rev_id'];
$select_replies="select * from review_reply join clients_reg on clients_reg.c_id=review_reply.rev_c_id_FK where rev_id_FK='$reply_id' and r_from='client'";
$select_replies_run=mysqli_query($conn,$select_replies);
if(mysqli_num_rows($select_replies_run)>0){

while($replies=mysqli_fetch_array($select_replies_run)){

?>

    <?php
$from=$replies['r_from'];
    ?>
    <div class="comment">
        <img width="45" height="45" class="rounded-circle" alt="User Image"
            src="data:<?php echo $replies['c_pic_type']; ?>;base64,<?php echo base64_encode($replies['c_pic']); ?>">
        <div class="comment-body m-3" style="display:inline-block; font-size:small;">
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
        <img width="45" height="45" class="rounded-circle" alt="User Image"
            src="data:<?php echo $l_reply['l_pic_type']; ?>;base64,<?php echo base64_encode($l_reply['l_pic']); ?>">
        <div class="comment-body m-3" style="display:inline-block; font-size:small;">
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
   


                <div id="mydiv">
                                <!-- reply adding sec -->

                                <div class="write-review">

                                    <form method="post">

                                        <div class="form-group">
                                            <label>Add a reply</label>
                                            <textarea id="review_desc" maxlength="100" name="reply"
                                                class="form-control"></textarea>
                                        </div>
                                        <br>
                                        <div class="submit-section">
                                            <button type="submit" formaction="submit_reply.php?id=<?php echo $review_fetch['rev_id']; ?>&lawyer_id=<?php echo $l_id; ?>" name="addreply"
                                                class="btn btn-secondary submit-btn">Reply</button>
                                        </div>
                                    </form>

                                </div>
                            </div>



            </div><hr>
            </li></ul><?php
       
        } ?></ul>
            

            <!-- review adding sec -->

            <div class="write-review">
                <h4 style="font-family:'Roboto', sans-serif;">Write a review for <strong>Mr/Ms.
                        <?php echo $row_id['l_name']; ?>
                    </strong></h4><br>

                <form method="post">
                   
                    <div class="form-group">
                        <label>Title of your review</label>
                        <input class="form-control" type="text" name="review-title"
                            placeholder="If you could say it in one sentence, what would you say?">
                    </div><br>
                    <div class="form-group">
                        <label>Your review</label>
                        <textarea id="review_desc" maxlength="100" name="review" class="form-control"></textarea>
                       
                    </div>
                    <br>
                    <div class="btn-group d-flex justify-content-end">
                        <h5>Recommend? &nbsp;</h5>
                        <input type="radio" class="btn-check" name="options" value="Yes" id="option1" required
                            autocomplete="off" checked />
                        <label class="review-button btn-outline-secondary" for="option1"><i
                                class="far fa-thumbs-up"></i> Yes</label>

                        <input type="radio" class="btn-check" name="options" value="No" id="option3" required
                            autocomplete="off" />
                        <label class="review-button btn-outline-secondary" for="option3"><i
                                class="far fa-thumbs-down"></i> No</label>
                    </div>

                    <div class="submit-section">
                        <button type="submit" name="addreview" class="btn btn-secondary submit-btn">Add Review</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <?php include '_shared/_footer.php'; ?>