<?php
include "shared/header.php";
require "shared/config.php";
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="list-links">
                        <li class="active"><a href="upcoming-appointments.html"> Appointments... </a> </li>
                    </ul>
                </div>
                <!-- <div class="col-auto">
                    <div class="bookingrange btn btn-white btn-sm">
                        <div class="cal-ico">
                            <i class="feather-calendar mr-1"></i>
                            <span>Select Date</span>
                        </div>
                        <div class="ico">
                            <i class="fas fa-chevron-left"></i>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="card-title">Upcoming Appointments</h5>
                            </div>
                            <!-- <div class="col-auto d-flex">
                                <form
                                    action="https://doccure-html.dreamguystech.com/template/admin/upcoming-appointments.html">
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="feather-filter me-1"></i> Filter</p>
                                            <span class="down-icon"><i class="feather-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <div class="form-custom">
                                                <input type="text" class="form-control bg-grey"
                                                    placeholder="Search by Patient">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <div class="form-custom">
                                                <input type="text" class="form-control bg-grey"
                                                    placeholder="Search by Doctor">
                                                <i class="fas fa-search"></i>
                                            </div>
                                            <p class="lab-title">Consultation Type</p>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="year">
                                                <span class="checkmark"></span> Video Call
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="year">
                                                <span class="checkmark"></span> Audio Call
                                            </label>
                                            <label class="custom_check w-100">
                                                <input type="checkbox" name="year">
                                                <span class="checkmark"></span> Chat
                                            </label>
                                            <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="datatable table table-borderless hover-table">
                                <thead class="thead-light">
                                    <tr>

                                        <th>Client</th>
                                        <th>Lawyer</th>
                                        <th>Complaint</th>
                                        <th>Date </th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$select_app="select * from lawyer_reg join appointments on lawyer_reg.l_id=appointments.lawyer_id
join clients_reg on appointments.c_id_FK=clients_reg.c_id";
$select_app_run=mysqli_query($conn,$select_app);
while($app_s=mysqli_fetch_array($select_app_run)){
    ?>
                                    <tr>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html"><img class="avatar avatar-img"
                                                        src="data:<?php echo $app_s['c_pic_type'];?>;base64,<?php echo base64_encode($app_s['c_pic']);?>"
                                                        alt="User Image"></a>
                                                <a href="profile.html"><span
                                                        class="user-name"><?php echo $app_s['c_name']; ?></span></a>
                                            </h2>
                                        </td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a class="avatar-pos" href="profile.html"><img class="avatar avatar-img"
                                                        src="data:<?php echo $app_s['l_pic_type'];?>;base64,<?php echo base64_encode($app_s['l_pic']);?>"
                                                        alt="User Image"></a>
                                                <a class="user-name"><span
                                                        class="text-muted"><?php echo $app_s['l_name']; ?></span> <span
                                                        class="tab-subtext"><?php echo $app_s['expertise']; ?></span></a>
                                            </h2>
                                        </td>
                                        <td><span class="disease-name"><?php echo $app_s['cl_ques_title']; ?></span>
                                        </td>
                                        <td class="status"><span class="d-block"><?php echo $app_s['b_date']; ?></span>
                                        </td>
                                        <td><span class="d-block"><?php echo $app_s['status']; ?></span></td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="tablepagination" class="dataTables_wrapper"></div>
            </div>
        </div>

    </div>
</div>

</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/datatables.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>

<script src="assets/js/script.js"></script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/upcoming-appointments.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:44:30 GMT -->

</html>