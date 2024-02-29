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


$fetch_law="select * from lawyer_reg where l_status=0";
$fetch_law_run=mysqli_query($conn,$fetch_law);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/images/law short logo.png" type="image/gif" sizes="20x20">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attorneys - Law Network</title>
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
    background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/images/attorneys.jpg');
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
                    Attorneys
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
                        <span>Our Attorneys</span>
                        <h2>Find Our Intellectual Lawyer for you.</h2>
                    </div>
                </div>
            </div>
            <form method="GET" class="d-flex justify-content-end">
        <input class="search-style me-2" name="matchforsearch" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-secondary" name="searchlawyer" type="submit">Search</button>
      </form><br><br><br><br><br>
            <div class="row justify-content-center g-4 mb-60">
                <?php
                if(isset($_GET['searchlawyer'])){
                    $search=$_GET['matchforsearch'];
                $select_search="select * from lawyer_reg where l_status=0 and l_name like'" . $search . "%' or city like'" . $search . "%' or expertise like'" . $search . "%' or address like'__" . $search . "__%'";
                $select_search_run=mysqli_query($conn,$select_search);
                    while($select_search_fetch=mysqli_fetch_array($select_search_run)){
                ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10  wow fadeInDown" data-wow-duration="1.5s"
                    data-wow-delay="0.2s">
                    <div class="attorney-single sibling2">
                        <img src="data:<?php echo $select_search_fetch['l_pic_type']; ?>;base64,<?php echo base64_encode($select_search_fetch['l_pic']); ?>" class="casestudy1"
                            alt="image">
                            
                        <div class="content">
                            <h4><a href="attorney-details.php?id=<?php echo $select_search_fetch['l_id']; ?>">
                                    <?php echo $select_search_fetch['l_name']; ?>
                                </a></h4>
                            <p>
                                <?php echo $select_search_fetch['expertise']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php }
               if(mysqli_num_rows($select_search_run)==0){
                    echo '<h2 class="text-center">No search result found</h2>';
                } } 
                else{
                    while($row=mysqli_fetch_array($fetch_law_run)){
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10  wow fadeInDown" data-wow-duration="1.5s"
                            data-wow-delay="0.2s">
                            <div class="attorney-single sibling2">
                                <img src="data:image/jpg;base64,<?php echo base64_encode($row['l_pic']); ?>" class="casestudy1"
                                    alt="image">
                                <div class="content">
                                    <h4><a href="attorney-details.php?id=<?php echo $row['l_id']; ?>">
                                            <?php echo $row['l_name']; ?>
                                        </a></h4>
                                    <p>
                                        <?php echo $row['expertise']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php }} ?>
                
            </div>
        </div>

        <?php include '_shared/_footer.php'; ?>