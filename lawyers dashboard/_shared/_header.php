<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link href="assets/image/law short logo.png" rel="icon">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/feather.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .footer-title{
            color:white;
        }
        .footer .footer-bottom .copyright{
             border-top: 1px solid grey;
             padding: 30px 0;
        }
        .a-col{
            color:black;
        }
        .green-icon{
            background-color:green;
            color:white;
            padding:4px;
            border-radius:6px;
        }
        .breadcrumb-bar {
    background-color: #b69d74 !important;
    padding: 15px 0;
}
        .bar-icon span {
    background-color: white;
    display: block;
    float: left;
    height: 3px;
    margin-bottom: 7px;
    width: 31px;
    border-radius: 2px;}
    .dashboard-menu > ul > li > a {
    color: #333;
    display: block;
    padding: 16px 20px;
    }
    </style>
</head>

<body>

    <div class="main-wrapper">

        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="../law network user/index.php" class="navbar-brand logo">
                        <img src="assets/image/law network logo.png" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper" style="background-color:#333;">
                    <div class="menu-header" style="background-color:#333;">
                        <a href="../law network user/index.php" class="menu-logo">
                            <img src="assets/image/law network logo.png" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>

                    <ul class="main-nav">
                        <li class="has-submenu">
                            <a href="../law network user/index.php">Law Network</a>
                        </li>
                        <li class="has-submenu">
                            <a href="website_reviews.php">Review us </i></a>
                        </li>
                        <li class="has-submenu">
                            <a href="contactus.php">Contactus </i></a>
                        </li>
                    </ul>

                </div>
                <ul class="nav header-navbar-rht">
                  
                
                                    <li><h5 style="color:grey;"><?php echo $row['l_name']; ?></h5></li>
                                
                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle" src="data:<?php echo $row['l_pic_type']; ?>;base64,<?php echo base64_encode($row['l_pic']); ?>" width="31"
                                    alt="<?php echo $row['l_name']; ?>">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img src="data:<?php echo $row['l_pic_type']; ?>;base64,<?php echo base64_encode($row['l_pic']); ?>" alt="<?php echo $row['l_name']; ?>"
                                        class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6><?php echo $row['l_name']; ?></h6>
                                    <p class="text-muted mb-0">Lawyer's dashboard</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="lawyers_dashboard.php">Dashboard</a>
                            <a class="dropdown-item" href="lawyer_profile_edit.php">Profile Settings</a>
                            <a class="dropdown-item" href="lawyer_logout.php">Logout</a>
                        </div>
                    </li>

                </ul>
            </nav>
        </header>

             