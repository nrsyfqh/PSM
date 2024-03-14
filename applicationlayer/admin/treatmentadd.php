<?php
    include('../../datalayer/server.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["username"])) {
        header("location: ../login.php");
    }

    // Assuming you have adminId in your session data
    $adminIdlogged = $_SESSION["adminId"]; // Replace "adminId" with the actual adminId
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
		
      <!-- PAGE -->
		<div class="page">
			<div class="page-main">
				<?php include 'sidebar.php' ?>

       			 <!-- Responsive layout-->
				<!-- PAGE -->
				<div class="app-content">
					<div class="side-app">
                		<!-- PAGE-HEADER -->
						<div class="page-header">
							<div>
								<h1 class="page-title">Add Treatment</h1>
								
							</div>
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 OPEN -->
						<form id="postForm" action="../../datalayer/treatment.php" method="POST">
							<div class="row">
								<div class="col-md-12 col-lg-12">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Treatment</h3>
										</div>
										<div class="card-body">
											<div class="table-responsive">
												<div class="col-md-6">
													<div class="form-group">
														<label class="form-label">Name treatment</label>
														<input type="text" class="form-control" id="name" name="name" placeholder="Name">

														<!-- Include adminId as a hidden input field -->
														<input type="hidden" name="adminId" value="<?php echo $adminIdlogged; ?>">
													</div>

													<div class="btn-list">
														<button class="btn btn-primary" name="submit" type="submit">Submit</button>
														<a href="treatmentlist.php" class="btn btn-danger" name="cancel">Cancel</a>
													</div>
												</div>
											</div>
										</div>
										<!-- TABLE WRAPPER -->
									</div>
									<!-- SECTION WRAPPER -->
								</div>
							</div>
						</form>
						<!-- ROW-1 CLOSED -->
					</div>
				</div>

		<script>
			document.addEventListener('DOMContentLoaded', function () {
				document.querySelector('#postForm').addEventListener('submit', function (event) {
					var nameInput = document.getElementById('name');

					// Validate treatment name
					if (!nameInput.value.trim()) {
						alert('Please enter the name of the treatment.');
						event.preventDefault();
						return;
					}
				});
			});
		</script>
        
		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

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