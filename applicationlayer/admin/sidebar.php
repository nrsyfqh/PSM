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

    <body class="app sidebar-mini">
	
		<!--APP-SIDEBAR-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			<aside class="app-sidebar">
				<div class="side-header">
					<a class="header-brand1" href="home.php">
						<br>
					<h1 class="page-title">Welcome to Admin Page</h1>
					</a>
					<!-- LOGO -->
				</div> 
				<style>
					.side-menu_space {
					padding: 6px; /* Adjust the value to control the amount of space */
					font-size: 15px; /* Adjust the value to set the font size */
					}
					</style>

				<ul class="side-menu">
				<li class="slide">
						<a class="side-menu__item" href="home.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1 2C1 1.44772 1.44772 1 2 1H22C22.5523 1 23 1.44772 23 2V8.25H16.6625L15.9273 6.82749C15.6104 6.21455 14.7339 6.21455 14.4171 6.82749L13.4741 8.65181L12.0621 11.3096L9.11018 4.88466C8.80686 4.22448 7.86874 4.22448 7.56542 4.88466L6.01921 8.25H1V2Z" fill="black"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M16.2668 9.75H23V16C23 16.5523 22.5523 17 22 17H15.5V22.25H18.5999C19.0141 22.25 19.3499 22.5858 19.3499 23C19.3499 23.4142 19.0141 23.75 18.5999 23.75H5.3999C4.98569 23.75 4.6499 23.4142 4.6499 23C4.6499 22.5858 4.98569 22.25 5.3999 22.25H8.5V17H2C1.44772 17 1 16.5523 1 16V9.75H6.4359C6.76797 9.75 7.06963 9.55662 7.20827 9.25487L8.3378 6.79644L11.2475 13.1295C11.5413 13.7689 12.4404 13.7948 12.7706 13.1734L14.8047 9.3444L15.1722 8.63338L15.5117 9.29029C15.6577 9.57266 15.949 9.75 16.2668 9.75ZM10 17V22.25H14V17H10Z" fill="black"/>
							</svg>
							<span class="side-menu_space ">Dashboard</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="doclist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M11.9995 10C14.4848 10 16.4995 7.98528 16.4995 5.5C16.4995 3.01472 14.4848 1 11.9995 1C9.51423 1 7.49951 3.01472 7.49951 5.5C7.49951 7.98528 9.51423 10 11.9995 10Z" fill="black"/>
								<path d="M11.84 14.8903L9.84956 13.2317C10.5421 13.08 11.2615 13 11.9995 13C12.7378 13 13.4575 13.08 14.1502 13.2319L12.16 14.8903C12.0673 14.9676 11.9327 14.9676 11.84 14.8903Z" fill="black"/>
								<path d="M15.25 14.2679L13.1203 16.0427C12.4713 16.5835 11.5287 16.5835 10.8797 16.0427L8.75 14.2679V16.3535C9.90425 16.68 10.75 17.7412 10.75 19V20C10.75 20.6903 10.1904 21.25 9.50001 21.25C9.0858 21.25 8.75001 20.9142 8.75 20.5C8.75 20.1735 8.9587 19.8956 9.25 19.7927L9.25 19C9.25 18.3096 8.69036 17.75 8 17.75C7.30964 17.75 6.75 18.3096 6.75 19L6.75 19.7927C7.0413 19.8956 7.25 20.1734 7.25 20.5C7.25 20.9142 6.91421 21.25 6.5 21.25C5.80964 21.25 5.25 20.6904 5.25 20L5.25 19C5.25 17.7412 6.09575 16.68 7.25 16.3535V14.1977C4.15096 15.8734 2.03703 19.1379 2 22.8995C1.99946 22.9548 2.04428 23 2.09951 23H21.8995C21.9547 23 21.9996 22.9548 21.999 22.8995C21.962 19.1383 19.8485 15.8741 16.75 14.1982V16.3535C17.9043 16.68 18.75 17.7412 18.75 19C18.75 20.5188 17.5188 21.75 16 21.75C14.4812 21.75 13.25 20.5188 13.25 19C13.25 17.7412 14.0957 16.68 15.25 16.3535V14.2679Z" fill="black"/>
								<path d="M14.75 19C14.75 18.3096 15.3096 17.75 16 17.75C16.6904 17.75 17.25 18.3096 17.25 19C17.25 19.6904 16.6904 20.25 16 20.25C15.3096 20.25 14.75 19.6904 14.75 19Z" fill="black"/>
							</svg>

							<span class="side-menu_space "> Doctor</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="schedulelist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.25 1.75C6.25 1.33579 5.91421 1 5.5 1C5.08579 1 4.75 1.33579 4.75 1.75V3H2C1.44772 3 1 3.44772 1 4V8.9C1 8.95523 1.04477 9 1.1 9H22.9C22.9552 9 23 8.95523 23 8.9L23 4C23 3.44772 22.5523 3 22 3H19.25V1.75C19.25 1.33579 18.9142 1 18.5 1C18.0858 1 17.75 1.33579 17.75 1.75V3H6.25V1.75Z" fill="black"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M22.9 10.5C22.9552 10.5 23 10.5448 23 10.6V22C23 22.5523 22.5523 23 22 23H2C1.44772 23 1 22.5523 1 22V10.6C1 10.5448 1.04477 10.5 1.1 10.5H22.9ZM12 13.5C12.4142 13.5 12.75 13.8358 12.75 14.25V16.5H15C15.4142 16.5 15.75 16.8358 15.75 17.25C15.75 17.6642 15.4142 18 15 18H12.75V20.25C12.75 20.6642 12.4142 21 12 21C11.5858 21 11.25 20.6642 11.25 20.25V18H9C8.58579 18 8.25 17.6642 8.25 17.25C8.25 16.8358 8.58579 16.5 9 16.5H11.25V14.25C11.25 13.8358 11.5858 13.5 12 13.5Z" fill="black"/>
							</svg>


							<span class="side-menu_space ">Schedule</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="appointmentlist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.39998 0.25C5.81499 0.25 6.15143 0.586436 6.15143 1.00145L6.15146 5.4016C6.15146 5.81662 5.81502 6.15305 5.40001 6.15305C5.03681 6.15305 4.7338 5.89539 4.66379 5.55289C4.66242 5.54621 4.66114 5.53949 4.65995 5.53273C4.65244 5.4901 4.64852 5.44624 4.64852 5.40145V1.00145C4.64852 0.586436 4.98496 0.25 5.39998 0.25Z" fill="black"/>
								<path d="M18.6 0.25C19.015 0.25 19.3515 0.586436 19.3515 1.00145V5.40145C19.3515 5.43063 19.3498 5.45942 19.3466 5.48774C19.3441 5.50976 19.3406 5.53149 19.3362 5.55289C19.2662 5.89539 18.9632 6.15305 18.6 6.15305C18.185 6.15305 17.8485 5.81662 17.8485 5.4016L17.8486 1.00145C17.8486 0.586436 18.185 0.25 18.6 0.25Z" fill="black"/>
								<path d="M7.65436 2.53909H16.3456V5.4016C16.3456 6.64665 17.3549 7.65596 18.6 7.65596C19.845 7.65596 20.8543 6.64665 20.8543 5.4016V2.53909H21.9981C22.5514 2.53909 23 2.98767 23 3.54102V9.26757L1 9.26756V3.54102C1 2.98767 1.44858 2.53909 2.00193 2.53909H3.14565V5.4016C3.14565 6.64665 4.15496 7.65596 5.40001 7.65596C6.64505 7.65596 7.65436 6.64665 7.65436 5.4016V2.53909Z" fill="black"/>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M1 10.7705L23 10.7705V21.9997C23 22.5531 22.5514 23.0017 21.9981 23.0017H2.00193C1.44858 23.0017 1 22.5531 1 21.9997V10.7705ZM6.76112 14.0268C6.76112 13.6118 6.42469 13.2754 6.00967 13.2754C5.59466 13.2754 5.25822 13.6118 5.25822 14.0268V14.0586C5.25822 14.4736 5.59466 14.81 6.00967 14.81C6.42469 14.81 6.76112 14.4736 6.76112 14.0586V14.0268ZM6.00967 18.285C6.42469 18.285 6.76112 18.6215 6.76112 19.0365V19.0683C6.76112 19.4833 6.42469 19.8197 6.00967 19.8197C5.59466 19.8197 5.25822 19.4833 5.25822 19.0683V19.0365C5.25822 18.6215 5.59466 18.285 6.00967 18.285ZM18.7843 14.0268C18.7843 13.6118 18.4479 13.2754 18.0329 13.2754C17.6179 13.2754 17.2814 13.6118 17.2814 14.0268V14.0586C17.2814 14.4736 17.6179 14.81 18.0329 14.81C18.4479 14.81 18.7843 14.4736 18.7843 14.0586V14.0268ZM18.0329 18.285C18.4479 18.285 18.7843 18.6215 18.7843 19.0365V19.0683C18.7843 19.4833 18.4479 19.8197 18.0329 19.8197C17.6179 19.8197 17.2814 19.4833 17.2814 19.0683V19.0365C17.2814 18.6215 17.6179 18.285 18.0329 18.285ZM12.7727 14.0268C12.7727 13.6118 12.4363 13.2754 12.0213 13.2754C11.6063 13.2754 11.2698 13.6118 11.2698 14.0268V14.0586C11.2698 14.4736 11.6063 14.81 12.0213 14.81C12.4363 14.81 12.7727 14.4736 12.7727 14.0586V14.0268ZM12.0213 18.285C12.4363 18.285 12.7727 18.6215 12.7727 19.0365V19.0683C12.7727 19.4833 12.4363 19.8197 12.0213 19.8197C11.6063 19.8197 11.2698 19.4833 11.2698 19.0683V19.0365C11.2698 18.6215 11.6063 18.285 12.0213 18.285Z" fill="black"/>
							</svg>
					<span class="side-menu_space ">Appointment</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="patientlist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M16.5 5.5C16.5 7.98528 14.4853 10 12 10C9.51472 10 7.5 7.98528 7.5 5.5C7.5 3.01472 9.51472 1 12 1C14.4853 1 16.5 3.01472 16.5 5.5Z" fill="black"/>
								<path d="M12 13C6.51068 13 2.0544 17.423 2.00049 22.8995C1.99995 22.9548 2.04477 23 2.1 23H21.9C21.9552 23 22 22.9548 21.9995 22.8995C21.9456 17.423 17.4893 13 12 13Z" fill="black"/>
							</svg>
							<span class="side-menu_space">Patient</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="treatmentlist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M3.99952 12.024L6.05322 21.2631C6.27117 22.2436 7.13149 22.9478 8.13573 22.9678C9.09828 22.9869 9.95914 22.3717 10.2528 21.4548L11.8429 16.4905C11.8946 16.329 12.121 16.3236 12.1804 16.4824L14.1113 21.6431C14.4018 22.4194 15.1435 22.9338 15.9723 22.9338C16.9033 22.9338 17.7094 22.2874 17.9117 21.3787L19.9946 12.024C19.9981 12.0083 20.006 11.994 20.0174 11.9826L20.136 11.864C21.3295 10.6705 22 9.05179 22 7.36396V6.5729C22 3.49507 19.5049 1 16.4271 1C15.7254 1 15.03 1.13252 14.3774 1.3906L13.819 1.61147C12.6431 2.07653 11.3342 2.07577 10.1588 1.60934L9.61141 1.3921C8.95863 1.13305 8.26269 1 7.56039 1C4.4895 1 2.00004 3.48943 2.00001 6.56032L2 7.36773C1.99998 9.0534 2.66835 10.6703 3.85857 11.864L3.97683 11.9826C3.98817 11.994 3.99604 12.0083 3.99952 12.024ZM8.33538 4.32918C7.9649 4.14394 7.51439 4.29411 7.32915 4.66459C7.14391 5.03507 7.29408 5.48558 7.66456 5.67082L8.08685 5.88197C10.5502 7.11365 13.4497 7.11365 15.9131 5.88197L16.3354 5.67082C16.7059 5.48558 16.856 5.03507 16.6708 4.66459C16.4855 4.29411 16.035 4.14394 15.6646 4.32918L15.2423 4.54033C13.2012 5.56086 10.7987 5.56086 8.75767 4.54033L8.33538 4.32918Z" fill="black"/>
							</svg>
							<span class="side-menu_space">Treatment</span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="mediclist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19 9C17.0472 9 15.4212 7.60065 15.0702 5.75L22.9298 5.75C22.5787 7.60065 20.9528 9 19 9Z" fill="black"/>
								<path d="M15.0702 4.25L22.9298 4.25C22.5787 2.39936 20.9528 1 19 1C17.0472 1 15.4212 2.39935 15.0702 4.25Z" fill="black"/>
								<path d="M2.38957 14.099C0.536813 12.2462 0.53681 9.24232 2.38956 7.38956C4.24232 5.53681 7.24622 5.53681 9.09897 7.38956L12.3244 10.615L5.61496 17.3244L2.38957 14.099Z" fill="black"/>
								<path d="M6.67562 18.385L13.385 11.6756L16.6104 14.901C18.4632 16.7538 18.4632 19.7577 16.6104 21.6104C14.7577 23.4632 11.7538 23.4632 9.90103 21.6104L6.67562 18.385Z" fill="black"/>
							</svg>

							<span class="side-menu_space">Medication</span></span>
						</a>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="feedbacklist.php">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M12.3883 2.04228L14.1614 7.83145C14.4067 8.63213 15.1432 9.18444 15.9839 9.18444H21.8408C22.2167 9.18444 22.4096 9.68525 22.0853 9.93522L17.2488 13.6629C16.6144 14.1518 16.3524 14.9846 16.5864 15.7488L18.41 21.7025C18.5358 22.1132 18.0738 22.3895 17.7772 22.161L13.1602 18.6025C12.4757 18.0749 11.5243 18.0749 10.8398 18.6025L6.22277 22.161C5.92622 22.3895 5.46419 22.1132 5.59 21.7025L7.41356 15.7488C7.64763 14.9846 7.38563 14.1518 6.75125 13.6629L1.91471 9.93522C1.59038 9.68525 1.78326 9.18444 2.15922 9.18444H8.01606C8.85678 9.18444 9.59332 8.63213 9.83856 7.83145L11.6117 2.04228C11.7311 1.65258 12.2689 1.65257 12.3883 2.04228Z" fill="black" stroke="black" stroke-width="1.5" stroke-linejoin="round"/>
							</svg>

							<span class="side-menu_space">Feedback</span>
						</a>
					</li>
				</ul>
			</aside>
		<!--/APP-SIDEBAR-->	

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		

	</body>
</html>
             
  