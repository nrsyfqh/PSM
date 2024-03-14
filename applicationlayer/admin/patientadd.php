<?php 
	include('../../datalayer/server.php');

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION["username"])){
		header("location: ../login.php");
	}
	$usernamelogged = $_SESSION["username"]; 

?>


<?php include 'header.php'; ?>
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

			<!-- INTERNAL SINGLE-PAGE CSS -->
			<link href="../assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

			<!-- CUSTOM SCROLL BAR CSS-->
			<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

			<!--- FONT-ICONS CSS -->
			<link href="../assets/css/icons.css" rel="stylesheet"/>

			<!-- COLOR SKIN CSS -->
			<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

			<!-- SIDE-MENU CSS -->
			<link href="../assets/css/closed-sidemenu.css" rel="stylesheet">

			<!--PERFECT SCROLL CSS-->
			<link href="../assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet"/>

			<!-- CUSTOM SCROLL BAR CSS-->
			<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

			<!-- SIDEBAR CSS -->
			<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		</head>
    <body class="app sidebar-mini">

		<!-- GLOBAL-LOADER -->
			<!--<div id="global-loader">
				<img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
			</div>
			GLOBAL-LOADER -->
		<!-- PAGE -->
			<div class="page">
				<div class="page-main">
					<?php include 'sidebar.php' ?>


			<!-- Responsive layout-->
			<!-- PAGE -->
			<div class="app-content">
				<div class="side-app">
				

							<!-- CONTAINER OPEN -->
						
						<div class="container-login100">
							<div class="wrap-login100 p-6">
								<form class="login100-form validate-form" action = "../../datalayer/patient.php" method="POST" >
									<span class="login100-form-title">
										Registration Patient
									</span>
									<!-- IC Number -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="text" name="patientId" placeholder="IC Number" required >
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity=".5">
												<rect x="2" y="4" width="20" height="16" rx="2" opacity=".8" />
												<path d="M7 15h0M2 9.5h20" opacity="0.3" />
											</svg>
										</span>
									</div>

									<!-- Name -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="text" name="name" placeholder="Name" required>
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
												<path d="M0 0h24v24H0V0z" fill="none" /><circle cx="12" cy="8" opacity=".3" r="2.1" />
												<path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3" />
												<path d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1c1.16 0 2.1.94 2.1 2.1 0 1.16-.94 2.1-2.1 2.1S9.9 9.16 9.9 8c0-1.16.94-2.1 2.1-2.1z" />
											</svg>
										</span>
									</div>

									<!-- Email -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="email" name="email" placeholder="Email">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
												<path d="M0 0h24v24H0V0z" fill="none" />
												<path d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z" opacity=".3" />
												<path d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z" />
											</svg>
										</span>
									</div>

									<!-- Username -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="text" name="username" placeholder="Username">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
												<path d="M0 0h24v24H0V0z" fill="none" /><circle cx="12" cy="8" opacity=".3" r="2.1" />
												<path d="M12 14.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1z" opacity=".3" />
												<path d="M12 13c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4zm6.1 5.1H5.9V17c0-.64 3.13-2.1 6.1-2.1s6.1 1.46 6.1 2.1v1.1zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6.1c1.16 0 2.1.94 2.1 2.1 0 1.16-.94 2.1-2.1 2.1S9.9 9.16 9.9 8c0-1.16.94-2.1 2.1-2.1z" />
											</svg>
										</span>
									</div>

									<!-- Password -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="password" id="password" name="password" placeholder="Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2zm1-6h-2v2h2v-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2s-2 .9-2 2s.9 2 2 2z"/></svg>
										</span>
									</div>

									<!-- Confirm Password -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2zm1-6h-2v2h2v-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2s-2 .9-2 2s.9 2 2 2z"/></svg>
										</span>
									</div>

									<!-- Phone Number -->
									<div class="wrap-input100 validate-input">
										<input class="input100" type="text" name="phone" placeholder="Phone Number" required>
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
												<path d="M0 0h24v24H0V0z" fill="none" />
												<path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" opacity=".3" />
												<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
											</svg>
										</span>
									</div>

									<div class="container-login100-form-btn">
										<input type="submit"  class="login100-form-btn btn-primary" value="Register" name="submit" onclick="return validateForm()">
									</div>

									<div class="container-login100-form-btn">
										<a href="patientlist.php"  class="login100-form-btn btn-danger" value="Cancel" name="cancel">Cancel</a>	
									</div>

								</form>
							</div>
						</div>
						<!-- CONTAINER CLOSED -->
					
					<!-- CONTAINER CLOSED -->   
					
				</div>
			</div>

			<script>
				function validateForm() {
					// Add your custom validation logic here
					if (!validateICNumber() || !validatePassword() || !customValidation()) {
						// Return false to prevent form submission
						alert('Form validation failed. Please check your inputs.');
						return false;
					}

					// Return true to allow form submission
					return true;
				}
				function validatePassword() {
					var password = document.getElementById('password').value;
					var confirm_password = document.getElementById('confirm_password').value;

					// Check if passwords match
					if (password !== confirm_password) {
						alert('Passwords do not match');
						return false;
					}

					return true;
				}

				// Add an event listener to the form to call the validation function before submission
				document.getElementById('yourFormId').addEventListener('submit', function (event) {
					if (!validatePassword()) {
						// Prevent form submission if validation fails
						event.preventDefault();
					}
				});
			</script>

			<script>
				function validateICNumber() {
					var icNumber = document.getElementsByName('patientId')[0].value;

					// Check if the IC number is exactly 12 digits
					if (icNumber.length !== 12) {
						alert('IC number should be 12 digits');
						return false;
					}

					// Check if all characters are digits
					if (!/^\d+$/.test(icNumber)) {
						alert('IC number should contain only digits');
						return false;
					}

					return true;
				}

				// Add an event listener to the form to call the validation function before submission
				document.getElementById('yourFormId').addEventListener('submit', function (event) {
					if (!validateICNumber()) {
						// Prevent form submission if validation fails
						event.preventDefault();
					}
				});
			</script>

			<script>
				document.addEventListener("DOMContentLoaded", function () {
					var emailInput = document.getElementById("email");
					var emailError = document.getElementById("emailError");

					emailInput.addEventListener("input", function () {
						var email = emailInput.value.trim();
						if (email === "") {
							emailError.textContent = "Email is required";
						} else if (!isValidEmail(email)) {
							emailError.textContent = "Invalid email format";
							alert("Invalid email format! Please enter a valid email address.");
						} else if (!endsWithGmail(email)) {
							emailError.textContent = "Email must be an email address";
							alert("Email must be an email address! Please enter a valid email address.");
						} else {
							emailError.textContent = "";
						}
					});

					function isValidEmail(email) {
						// Use a simple regex for basic email format validation
						return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
					}

					function endsWithGmail(email) {
						// Check if the email ends with @gmail.com
						return /.com$/i.test(email);
					}
				});
			</script>
			
			<!-- JQUERY JS -->
			<script src="../assets/js/jquery-3.4.1.min.js"></sCRIPT>

			<!-- BOOTSTRAP JS -->
			<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

			<!-- SPARKLINE JS-->
			<script src="../assets/js/jquery.sparkline.min.js"></script>

			<!-- CHART-CIRCLE JS-->
			<script src="../assets/js/circle-progress.min.js"></script>

			<!-- RATING STARJS -->
			<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

			<!-- EVA-ICONS JS -->
			<script src="../assets/iconfonts/eva.min.js"></script>

			<!-- INTERNAL CHARTJS CHART JS -->
			<script src="../assets/plugins/chart/Chart.bundle.js"></script>
			<script src="../assets/plugins/chart/utils.js"></script>

			<!-- INTERNAL PIETY CHART JS -->
			<script src="../assets/plugins/peitychart/jquery.peity.min.js"></script>
			<script src="../assets/plugins/peitychart/peitychart.init.js"></script>

			<!-- SIDE-MENU JS-->
			<script src="../assets/plugins/sidemenu/sidemenu.js"></script>

			<!-- PERFECT SCROLL BAR js-->
			<script src="../assets/plugins/p-scroll/perfect-scrollbar.min.js"></script>
			<script src="../assets/plugins/sidemenu/sidemenu-scroll.js"></script>

			<!-- CUSTOM SCROLLBAR JS-->
			<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

			<!-- SIDEBAR JS -->
			<script src="../assets/plugins/sidebar/sidebar.js"></script>

			<!-- INTERNAL APEXCHART JS -->
			<script src="../assets/js/apexcharts.js"></script>

			<!--INTERNAL  INDEX JS -->
			<script src="../assets/js/index1.js"></script>

			<!-- CUSTOM JS -->
			<script src="../assets/js/custom.js"></script>

        
    </body>
</html>

<?php include 'footer.php'; ?>