  <!-- side-bar start -->

  <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

                    <div class="profile-sidebar">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="#" class="booking-doc-img">
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['l_pic']); ?>"
                                        alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3>
                                        <?php echo $row['l_name']; ?>
                                    </h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0">
                                            <?php echo $row['expertise']; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="lawyers_dashboard.php">
                                            <i class="fas fa-columns"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my_appointments.php">
                                            <i class="fas fa-calendar-check"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my_clients.php">
                                            <i class="fas fa-user-injured"></i>
                                            <span>My Clients</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="reviews.php">
                                            <i class="fas fa-star"></i>
                                            <span>Your Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="lawyer_profile_edit.php">
                                            <i class="fas fa-user-cog"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pass_change.php">
                                            <i class="fas fa-lock"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="lawyer_logout.php">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    </div>

                    <!-- sidebar end -->