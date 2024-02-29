<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
   header('location:login.php');
}
include "shared/header.php";
require "shared/config.php";


?>
<div class="page-wrapper">
    <div class="content container-fluid pb-0">
        <h4 class="mb-3">Overview</h4>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="feather-user-plus"></i>
                            </span>
                            <div class="dash-count">
                                <h5 class="dash-title">LAWYERS</h5>
                                <div class="dash-counts">
                                   
                                    <?php $l_q="SELECT * from lawyer_reg where l_status =0";
                                            $lrun=mysqli_query($conn,$l_q);
                                            if($l_row=mysqli_num_rows($lrun)){
                                                    echo "<p> $l_row</p>";
                                            }else{
                                                echo "NO DATA";
                                            }
                                           
                                    
                                  
                                     ?>
                                   
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-blue">
                                <i class="feather-users"></i>
                            </span>
                            <div class="dash-count">
                                <h5 class="dash-title">CLIENTS</h5>
                                <div class="dash-counts">
                                <?php $c_q="SELECT * from clients_reg ";
                                            $crun=mysqli_query($conn,$c_q);
                                            if($c_row=mysqli_num_rows($crun)){
                                                    echo "<p> $c_row</p>";
                                            }else{
                                                echo "NO DATA";
                                            }
                                           
                                    
                                  
                                    ?>                            
                               </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-warning">
                                <img src="assets/img/icon/calendar.png" alt="User Image">
                            </span>
                            <div class="dash-count">
                                <h5 class="dash-title">APPOINMENT</h5>
                                <div class="dash-counts">
                                <?php $a_q="SELECT * from appointments";
                                            $arun=mysqli_query($conn,$a_q);
                                            if($a_row=mysqli_num_rows($arun)){
                                                    echo "<p> $a_row</p>";
                                            }else{
                                                echo "NO DATA";
                                            }
                                           
                                    
                                  
                                     ?>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-danger">
                                <img src="assets/img/icon/chart.png" alt="User Image">
                            </span>
                            <div class="dash-count">
                                <h5 class="dash-title">REVIEWS</h5>
                                <div class="dash-counts">
                                <?php $w_q="SELECT * from website_review ";
                                            $wrun=mysqli_query($conn,$w_q);
                                            if($w_row=mysqli_num_rows($wrun)){
                                                    echo "<p> $w_row</p>";
                                            }else{
                                                echo "NO DATA";
                                            }
                                           
                                    
                                  
                                     ?>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="row">


           <div class="row">
                <div class="col-md-6">
                    <div class="section-heading">
                        <h5 class="mb-0">Future Appointments <span class="num-circle"><?php $a_q="SELECT * from appointments where b_date > curdate() ";
                                            $arun=mysqli_query($conn,$a_q);
                                            if($a_row=mysqli_num_rows($arun)){
                                                    echo "<p> $a_row</p>";
                                            }else{
                                                echo "NO DATA";
                                            }
                                           
                                    
                                  
                                     ?></span></h5>
                    </div>
                </div>
                <div class="col-lg-13">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title"></h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-borderless hover-table">
                                        <thead class="thead-light">

                                            <tr>
                                                <th>CLIENT</th>
                                                <th>LAWYER</th>
                                                <th>PROBLEM</th>
                                                <th>DATE</th>
                                                <?php
                                                 $app_q="select * from appointments join clients_reg on clients_reg.c_id=appointments.c_id_FK
                                                        join lawyer_reg on lawyer_reg.l_id=appointments.lawyer_id where b_date > curdate()
                                                        ";
                                                   $app_r=mysqli_query($conn,$app_q);
                                                   while($recent_row=mysqli_fetch_array($app_r)){
                                                   ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>
                                                <a ><img class="avatar avatar-img"
                                                  src="data:<?php echo $recent_row['c_pic_type'];?>;base64,<?php echo base64_encode($recent_row['c_pic']);?>"
                                                    alt="User Image"></a>
                                                    #
                                                    <?php echo $recent_row['c_id'];?>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a><img class="avatar avatar-img"
                                                                src="data:<?php echo $recent_row['l_pic_type'];?>;base64,<?php echo base64_encode($recent_row['l_pic']);?>"
                                                                alt="User Image"></a>
                                                        <a href="#" class="user-name">
                                                            <?php echo $recent_row['l_name'];?>
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td><span class="disease-name">
                                                        <?php echo $recent_row['cl_ques_title'];?>
                                                    </span></td>
                                                <td>
                                                    <span class="text-yellow user-name">
                                                        <?php echo $recent_row['b_date'];?>
                                                    </span>
                                                    <!-- <span class="d-block">23 Nov 2020</span> -->
                                                    <?php
                                                       }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>    
            </div>
        </div> 

        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header border-bottom-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Recent Client Activity</h5>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-borderless hover-table">
                                        <thead class="thead-light">

                                            <tr>
                                                <th>ID</th>
                                                <th>Client</th>
                                                <th>Problem</th>
                                                <th>Date </th>
                                                <?php
                                                 $recent_query="select * from clients_reg join appointments on appointments.c_id_FK=clients_reg.c_id";
                                                   $recent_run=mysqli_query($conn,$recent_query);
                                                   while($recent_row=mysqli_fetch_array($recent_run)){
                                                   ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>#
                                                    <?php echo $recent_row['c_id'];?>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="profile.html"><img class="avatar avatar-img"
                                                                src="data:<?php echo $recent_row['c_pic_type'];?>;base64,<?php echo base64_encode($recent_row['c_pic']);?>"
                                                                alt="User Image"></a>
                                                        <a href="#" class="user-name">
                                                            <?php echo $recent_row['c_name'];?>
                                                        </a>
                                                    </h2>
                                                </td>
                                                <td><span class="disease-name">
                                                        <?php echo $recent_row['cl_ques_title'];?>
                                                    </span></td>
                                                <td>
                                                    <span class="text-yellow user-name">
                                                        <?php echo $recent_row['b_date'];?>
                                                    </span>
                                                    <!-- <span class="d-block">23 Nov 2020</span> -->
                                                    <?php
                                                       }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>    

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Top Lawyer</h5>
                                    </div>
                                </div>

                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table doc-table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <!-- fetch lawyer details -->
                                                        <?php
                                                      // lawyer ko 100 se above karna ha 
                                                          $query_fetch="SELECT * FROM `lawyer_reg` where l_status=1 and case_won >100 ";
                                                            $result=mysqli_query($conn,$query_fetch);
                                                            while($row=mysqli_fetch_array($result)){
    

                                                           ?>
                                                        <h2 class="table-avatar">
                                                            <a class="avatar-pos avatar-online" href="profile.html"><img
                                                                    class="avatar avatar-img"
                                                                    src="data:<?php echo $row['l_pic_type'];?>;base64,<?php echo base64_encode($row['l_pic']);?>"
                                                                    alt="" style="width:45px; height: 50px;"></a>
                                                            <a href="#" class="user-name"><span class="text-muted">
                                                                    <?php echo $row['l_name']?>
                                                                </span> <span class="tab-subtext">
                                                                    <?php echo $row['expertise']?>
                                                                </span></a>

                                                        </h2>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                              


                                                        <?php
                                                            }
                                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


               
           
        </div>

    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/select2/js/select2.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/moment.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="assets/js/script.js"></script>
    </body>

    <!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:43:57 GMT -->

    </html>