<?php 

	/**
	 * for ensuring removing duplicate session
	 * or ignoring session_start
	 */
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION["username"])){
		header("location: ../login.php");
	}
	$usernamelogged = $_SESSION["username"]; 

	
?>

<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">

		<!-- FAVICON 
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />-->

		<!-- TITLE -->
		<title>Dental Clinic Appointment</title>

		<!-- BOOTSTRAP CSS -->
		<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="../assets/css/style.css" rel="stylesheet"/>
		<link href="../assets/css/skin-modes.css" rel="stylesheet"/>
		<link href="../assets/css/dark-style.css" rel="stylesheet"/>

		<!-- SIDE-MENU CSS -->
		<link href="../assets/css/closed-sidemenu.css" rel="stylesheet">

		<!--PERFECT SCROLL CSS-->
		<link href="../assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet"/>

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="../assets/css/icons.css" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

	</head>
	
	<!-- App-Header -->
		<div class="app-header header">
			<div class="container-fluid">
				<div class="d-flex">
					<a class="header-brand d-md-none" href="#">
					<img src="../assets/images/brand/logo-3.png" class="header-brand-img mobile-icon" alt="logo">
						<img src="../assets/images/brand/logo.png" class="header-brand-img desktop-logo mobile-logo" alt="logo">
					</a>
					<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#">
						<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M21 11.01L3 11v2h18zM3 16h12v2H3zM21 6H3v2.01L21 8z"/></svg>
					</a><!-- sidebar-toggle-->
					<div class="d-flex ml-auto header-right-icons header-search-icon">
						<button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
							aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
							<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="navbar-toggler-icon"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
						</button>
						<div class="dropdown d-none d-lg-flex">
							<a class="nav-link icon full-screen-link nav-link-bg">
								<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fullscreen-button"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="12" opacity=".3" r="3"/><path d="M7 12c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm8 0c0 1.65-1.35 3-3 3s-3-1.35-3-3 1.35-3 3-3 3 1.35 3 3zM3 19c0 1.1.9 2 2 2h4v-2H5v-4H3v4zM3 5v4h2V5h4V3H5c-1.1 0-2 .9-2 2zm18 0c0-1.1-.9-2-2-2h-4v2h4v4h2V5zm-2 14h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z"/></svg>
							</a>
						</div><!-- FULL-SCREEN -->
						<div class="dropdown profile-1">
							<a href="#" data-toggle="dropdown" class="nav-link pl-2 pr-2  leading-none d-flex">
								<!-- <span>
									<img src="../assets/images/users/10.jpg" alt="profile-user" class="avatar  mr-xl-3 profile-user brround cover-image">

								</span> -->
								<style>
								.user-info {
									margin-left: 10px; /* Adjust the value based on your preference */
								}
							</style>

							<div class="text-center mt-1 d-none d-xl-block">
								<h3 class="text-dark mb-0 fs-13 font-weight-semibold">
									<i class="fa fa-user"></i><span class="user-info"><medium><?php echo $_SESSION['username'] ?></medium></span>
								</h3>
							</div>

							</a>
				
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<a class="dropdown-item" href="profile.php">
									<i class="dropdown-icon mdi mdi-account-outline"></i> My Profile
								</a>
								<a class="dropdown-item" href="../../datalayer/logoutprocess.php">
									<!--../loginadmin.php-->
									<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
								</a>
							</div>
						</div>
						<!-- SIDE-MENU -->
					</div>
				</div>
			</div>
		</div>
	<!-- responsive-navbar -->
		<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
			<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
				<div class="d-flex order-lg-2 ml-auto">
					<div class="dropdown d-md-flex">
						<a class="nav-link icon full-screen-link nav-link-bg">
							<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24" class="fullscreen-button"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="12" cy="12" opacity=".3" r="3"/><path d="M7 12c0 2.76 2.24 5 5 5s5-2.24 5-5-2.24-5-5-5-5 2.24-5 5zm8 0c0 1.65-1.35 3-3 3s-3-1.35-3-3 1.35-3 3-3 3 1.35 3 3zM3 19c0 1.1.9 2 2 2h4v-2H5v-4H3v4zM3 5v4h2V5h4V3H5c-1.1 0-2 .9-2 2zm18 0c0-1.1-.9-2-2-2h-4v2h4v4h2V5zm-2 14h-4v2h4c1.1 0 2-.9 2-2v-4h-2v4z"/></svg>
						</a>
					</div><!-- FULL-SCREEN -->
				</div>
			</div>
		</div>
	<!-- End responsive-navbar -->
	<!-- App-Header -->
</div>

</html>