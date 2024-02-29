<?php
error_reporting(0);
session_start();
$email=$_SESSION['clients_email'];
$pass=$_SESSION['clients_pass'];
$id=$_SESSION['clients_id'];
include "../admin panel/shared/config.php";



$select="select * from clients_reg where c_id='$id'";
$select_run=mysqli_query($conn,$select);
$select_fetch=mysqli_fetch_array($select_run);

// php for showing lawyers according their expertise

if(isset($_POST['law'])){
    $trun="truncate law_expert";
    $trun_run=mysqli_query($conn,$trun);
    $expertise = $_POST['expertise'];
    $law_exp="insert into law_expert(c_id , expertise) value('$id','$expertise')";
    $law_exp_run=mysqli_query($conn,$law_exp);
}

if (isset($_POST['submit'])) {
  $lawyer=$_POST['lawyer'];
  $number=$_POST['number'];
  $city=$_POST['city'];
  $address=$_POST['address'];
  $time=$_POST['time'];
  $date=date('Y-m-d', strtotime($_POST['date']));
  $ques_title=$_POST['ques_title'];
  $question=$_POST['question'];

  $appoint="insert into appointments(cl_num , cl_que , cl_ques_title , c_id_FK ,  cl_city , cl_address ,
   b_time , b_date , lawyer_id , status) value('$number','$question','$ques_title','$id','$city','$address','$time','$date','$lawyer',1)";
  $appoint_run =mysqli_query($conn,$appoint);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Aboutus - Law Network</title>
   <style>
      @media (min-width: 1025px) {
         .h-custom {
            height: 100vh !important;
         }
      }

      .parallax {
         background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6)), url('assets/images/aboutus.jpg');
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
                  Aboutus
               </h2>
               <nav aria-label="breadcrumb">
               </nav>
            </div>
         </div>
      </div>
   </div>

   <!-- info -->
   <div class="row w-100 p-4">
      <div class="col-12 col-sm-12 col-lg-4"><br><br>
         <img class="img-fluid" src="assets/images/bg/banner31.png" alt="">
      </div>
      <div class="col-12 col-sm-12 col-lg-5 p-4"><br><br><br>
         <h3>Protecting the Law Since 2000</h3>
         <p>
            Law Network is one of the largest and most well reputed law firms in Pakistan, highly regarded for its
            expertise in both contentious and non-contentious matters. The firm has 12 Partners and over 30 associates .
            We provide our service in all over Pakistan with greatest transparency and reliability.
         </p>

      </div>
      <div class="col-12 col-sm-12 col-lg-3 p-4"><br><br><br>
         <h2>Our Awards</h2>
         <img class="img-fluid" src="assets/images/bg/awards.png" alt="">
      </div>
   </div>

   <!-- it's attorneys section -->

   <div class="attorneys-section pt-90 pb-90">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-7">
               <div class="section-title1 text-center">
                  <h2>Our top Attorneys</h2>
                  <p>Our certified professional, top, experienced Attorneys who advise and represent natural and legal
                     persons in legal matters.</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="swiper attorney-slider pb-65">
                  <div class="swiper-wrapper">
                     <?php
                  $fetch_law="select * from lawyer_reg where l_status=0 and case_won>100";
                  $fetch_law_run=mysqli_query($conn,$fetch_law);
                     while($row=mysqli_fetch_array($fetch_law_run)){
                  ?>
                     <div class="swiper-slide wow fadeInDown" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <div class="attorney-single">
                           <img src="data:image/jpg;base64,<?php echo base64_encode($row['l_pic']); ?>"
                              class="casestudy1" alt="image">
                           <div class="content">
                              <h4><a href="attorney-details.php?id=<?php echo $row['l_id']; ?>">
                                    <?php echo $row['l_name']; ?>
                                 </a></h4>
                              <p>
                                 <?php echo $row['expertise']; ?><br><br><br>
                              </p>
                           </div><br><br>
                        </div>
                     </div>
                     <?php } ?>

                  </div>
                  <div class="swiper-pagination d-flex align-items-center justify-content-center"></div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- user engaging div -->

   <div class="info-section">
      <div class="container-fluid">
         <div class="row g-4">
            <div class="col-xl-2 col-lg-3 col-md-12 order-lg-1 order-3">
               <div class="progress-area">
                  <div id="progress" class="progress-item mb-lg-4 mb-md-0 mb-4">
                     <svg viewbox="0 0 110 100">
                        <linearGradient id="gradient" x1="0" y1="0" x2="0" y2="100%">
                           <stop offset="0%" stop-color="#56c4fb" />
                           <stop offset="100%" stop-color="#0baeff" />
                        </linearGradient>
                        <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                        <path id="blue" fill='none' class="blue" d="M30,90 A40,40 0 1,1 80,90" />
                        <text x="50%" y="80%" dominant-baseline="middle" text-anchor="middle"
                           style="font-size:18px;">85%</text>
                     </svg>
                     <h5>Case Win</h5>
                  </div>
                  <div id="progress1" class="progress-item">
                     <svg viewbox="0 0 110 100">
                        <linearGradient id="gradient2" x1="0" y1="0" x2="0" y2="100%">
                           <stop offset="0%" stop-color="#56c4fb" />
                           <stop offset="100%" stop-color="#0baeff" />
                        </linearGradient>
                        <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                        <path id="blue1" fill='none' class="blue" d="M30,90 A40,40 0 1,1 80,90" />
                        <text x="50%" y="80%" dominant-baseline="middle" text-anchor="middle"
                           style="font-size:18px;">90%</text>
                     </svg>
                     <h5>Legal Solutions</h5>
                  </div>
               </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-9 order-lg-2 order-1 ms-5">
               <div class="info-content">
                  <h2>We Are The Most Populer Law Firm With Legal Law.</h2>
                  <p>Get Law Network Firm aims to be a reference for law firms in Islamabad, delivering reliable legal
                     services and assistance tailored to its clients’ requirements within every area of practice.</p>
                  <ul class="info-list">
                     <li>
                        <h4>Open Hour</h4>
                        <p>Seven days(whole week) <br>
                           11.00 AM - 06.00 PM</p>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="container">

      <div class="row p-4">
         <div class="col-12 col-sm-12 col-lg-4"><br><br>
            <img class="img-fluid" src="assets/images/bg/casestudy3.png" alt="">
         </div>
         <div class="col-12 col-sm-12 col-lg-5 p-4"><br><br><br>
            <p>
               Legal expertise is, of course, crucial to understanding litigation. But strategy is the key to knowing
               how and when to implement it. Our combination of technical skill and front-line experience means we
               represent our clients with resilience and determination, protecting their interests and resisting any
               challenge.
            </p>
            <h3>Our Mission</h3>
            <p>
               Our multilingual, young and passionate team of lawyers and assistants work together with shared values
               for greater standards of service and continuous assistance to the client.
            </p>
         </div>
         <div class="col-12 col-sm-12 col-lg-3 p-4"><br><br><br>
            <img class="img-fluid" src="assets/images/bg/casestudy6.png" alt="">
         </div>
      </div>
   </div>




   <!-- it's footer -->
   <?php
include '_shared/_footer.php';
?>