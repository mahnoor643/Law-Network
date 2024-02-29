<?php
require "shared/config.php";
$select_admin="select * from admin";
$select_admin_run=mysqli_query($conn,$select_admin);
$admin_fet=mysqli_fetch_array($select_admin_run);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2022 14:43:32 GMT -->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>LAW NETWORK</title>

	<link rel="shortcut icon" href="img/law short logo.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">

	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<link rel="stylesheet" href="assets/css/feather.css">

	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

	<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.min.css">

	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" href="assets/css/style.css">
	
</head>
<style>
	.sidebar-menu li a:hover {
		color: #b69d74;
	}

	.sidebar-menu>ul>li>a:hover {
		color: #b69d74;
	}

	.sidebar-menu li.active>a {
		color: #b69d74;
		position: relative;
	}

	.header {
		background: #333;
		left: 0;
		position: fixed;
		right: 0;
		top: 0;
		z-index: 1002;
		height: 60px;
		border-bottom: 1px solid #F5F6FA;
	}

	/* setting icon */
	a {
		color: #333;
	}

	a:hover {
		color: #333;
		text-decoration: none;
	}

	/* icon feather */
	.feather-chevrons-left:before {
		content: "\e933";
		color: white;
	}

	.feather-bell:before {
		content: "\e91e";
		color: white;
	}

	/* search  */
	.top-nav-search .form-control {
		border-color: #b69d74 !important;
		background: transparent;
		border-radius: .5rem;
		color: #7E84A3;
		height: 40px;
		padding: 10px 10px 10px 38px;
	}

	.bg-primary,
	.badge-primary {
		background-color: #333 !important;
	}
	/* for active */
	.sidebar-menu li.menu-title a {
	color: #b69d74;
	display: inline-block;
	margin-left: auto;
	padding: 0;
	}
	.list-links li.active a {
	background: #FFFFFF;
	border: 1px solid #b69d74;
	color: #b69d74;
   }
/* button */
.btn-primary {
	background-color: #b69d74;
	border: 1px solid #b69d74;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary.active,
.btn-primary:active,
.open > .dropdown-toggle.btn-primary {
	background-color: #b69d74;
	border: 1px solid #b69d74;
}
.btn-primary.active.focus,
.btn-primary.active:focus,
.btn-primary.active:hover,
.btn-primary.focus:active,
.btn-primary:active:focus,
.btn-primary:active:hover,
.open > .dropdown-toggle.btn-primary.focus,
.open > .dropdown-toggle.btn-primary:focus,
.open > .dropdown-toggle.btn-primary:hover {
	background-color: #b69d74;
	border: 1px solid #b69d74;
}
.btn-primary.active:not(:disabled):not(.disabled),
.btn-primary:active:not(:disabled):not(.disabled),
.show > .btn-primary.dropdown-toggle {
	background-color: #b69d74;
	border-color: #b69d74;
	color: #fff;
}

</style>

<body>

	<div class="main-wrapper">

		<div class="header">

			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="img/law network logo.png" alt="Logo">
				</a>
				<a href="index.php" class="logo logo-small">
					<img src="img/law short logo.png" alt="Logo" width="30" height="30">
				</a>
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="feather-chevrons-left"></i>
				</a>
			</div>


			


			<a class="mobile_btn" id="mobile_btn">
				<i class="fas fa-bars"></i>
			</a>


			<ul class="nav nav-tabs user-menu">

				<li class="nav-item">
					<a href="#" id="dark-mode-toggle" class="dark-mode-toggle">
						<i class="feather-sun light-mode"></i><i class="feather-moon dark-mode"></i>
					</a>
				</li>


				<li class="nav-item dropdown noti-nav">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<i class="feather-bell"></i> <span class="badge"></span>
					</a>
				</li>


				<li class="nav-item dropdown main-drop">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<span class="user-img">
							<img src="assets/img/profiles/avatar-01.jpg" alt="">
							<span class="status online"></span>
						</span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
									class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6><?php echo $admin_fet['name']; ?></h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile.php"><i class="feather-user me-1"></i> My Profile</a>
					
						<a class="dropdown-item" href="account-setting.php"><i class="feather-sliders me-1"></i>
							Account Settings</a>
						<hr class="my-0 ms-2 me-2">
						<a class="dropdown-item" href="logout.php"><i class="feather-log-out me-1"></i> Logout</a>
					</div>
				</li>

			</ul>

		</div>


		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title"><span>Main</span></li>
						<li class="active">
							<a href="index.php"><i class="feather-grid"></i> <span>Dashboard</span></a>
						</li>
						<li>
							<a href="appointment.php"><i class="feather-calendar"></i>
								<span>Appointments</span></a>
						</li>
						<li>
							<a href="lawyers.php"><i class="feather-user-plus"></i> <span>lawyers</span></a>
						</li>
						<li>
							<a href="active_lawyer.php"><i class="feather-user-plus"></i> <span>Active lawyers</span></a>
						</li>
						<li> 
                        <a href="revieews.php"><i class="feather-star"></i> <span>Reviews</span></a>
                        </li> 
						<li> 
                        <a href="web-review.php"><i class="feather-star"></i> <span>website-Reviews</span></a>
                        </li> 
						<li>
							<a href="client.php"><i class="feather-users"></i> <span>Clients</span></a>
						</li>
						<li>
							<a href="contact.php"><i class="feather-users"></i> <span>Contact</span></a>
						</li>
						
						
						
						<li class="menu-title">
							<span>Blog</span>
						</li>
						<li class="submenu">
							<a href="#"><i class="feather-grid"></i> <span> Blog</span> <span
									class="menu-arrow"></span></a>
							<ul>
								<li><a href="blog.php">Blogs</a></li>
								<li><a href="add-blog.php">Add Blog</a></li>
								
							</ul>
						</li>
						<li class="menu-title">
							<span>Pages</span>
						</li>
						<li>
							<a href="profile.php"><i class="feather-user"></i> <span>Profile</span></a>
						</li>

					</ul>
				</div>
			</div>
		</div>