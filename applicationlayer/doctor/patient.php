<?php 
	include('../../datalayer/server.php');
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

        <!-- FONT AWESOME ICON -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.2/css/all.min.css" integrity="sha384-Z2UDkyaPkpqPKVaZDGxrr82h0e8cPY1Js99PO1iwb9pGp5UbrhE3VTt5cVrQFfN4" crossorigin="anonymous">


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
                <!-- PAGE-HEADER -->
						<div class="page-header">
							<div>
								<h1 class="page-title">Patient</h1>
								
							</div>
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
										<div class="card-header">
											<form method="post" action="">
												<br>
												<h3 class="card-title">List of Patients</h3>
												<br>
												<div class="wd-200 mg-b-30">
													<div class="input-group">
														<input placeholder="Name or IC Number" id="nameIC" name="searchNameIC" class="form-control" />

														<div class="input-group-append">
															<button type="submit" class="btn btn-primary" onclick="validateSearchNameIC()">Search</button>
														</div>
													</div>
												</div>																											
											</form>
										</div>
										<script>
											var nameRegex = /^[a-zA-Z\s]+$/;
											var icNumberRegex = /^[0-9]{12}$/;

											function validateSearchNameIC() {
												var nameInput = document.getElementById('nameIC');

												// Trim and check if either a valid name or IC number is provided
												if (!(nameRegex.test(nameInput.value.trim()) || icNumberRegex.test(nameInput.value.trim()))) {
													alert('Please enter a correct name or IC number');
													return false; // Prevent form submission
												}

												return true; // Allow form submission
											}
										</script>
										
										<div class="card-body">
											<div class="table-responsive">
												<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
													<thead>
														<tr>
															<th class="wd-15p">Id </th>
															<th class="wd-15p">Name</th>
															<th class="wd-20p">Email</th>
															<th class="wd-15p">Phone</th>
															<th class="wd-15p">Status</th>
															<th class="wd-15p">Actions</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															include ("../../datalayer/server.php");

															// Initialize $results to an empty array
															$results = array();

															// Pagination settings
															$rowsPerPage = 10;
															$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
															$startRow = ($currentPage - 1) * $rowsPerPage;

															if ($_SERVER['REQUEST_METHOD'] == 'POST') {
																$searchNameIC = '%' . mysqli_real_escape_string($mysqli, $_POST['searchNameIC']) . '%';

																$stmt = $mysqli->prepare("SELECT COUNT(*) as total FROM patient
																						WHERE patientId LIKE ? OR name LIKE ?");
																$stmt->bind_param("ss", $searchNameIC, $searchNameIC);
																$stmt->execute();
																$totalResult = $stmt->get_result();
																$totalRows = $totalResult->fetch_assoc()['total'];
																$stmt->close();

																$stmt = $mysqli->prepare("SELECT patientId, name, email, phone, status FROM patient
																						WHERE patientId LIKE ? OR name LIKE ?
																						LIMIT ?, ?");
																$stmt->bind_param("ssii", $searchNameIC, $searchNameIC, $startRow, $rowsPerPage);
																$stmt->execute();
																$results = $stmt->get_result();
																$stmt->close();
															} else {
																$stmt = $mysqli->prepare("SELECT COUNT(*) as total FROM patient");
																$stmt->execute();
																$totalResult = $stmt->get_result();
																$totalRows = $totalResult->fetch_assoc()['total'];
																$stmt->close();

																$stmt = $mysqli->prepare("SELECT patientId, name, email, phone, status FROM patient
																						LIMIT ?, ?");
																$stmt->bind_param("ii", $startRow, $rowsPerPage);
																$stmt->execute();
																$results = $stmt->get_result();
																$stmt->close();
															}
														?>

														<?php while ($row = mysqli_fetch_assoc($results)) { ?>
															<tr>
																<td><?php echo $row['patientId'] ?></td>
																<td><?php echo $row['name'] ?></td>
																<td><?php echo $row['email'] ?></td>
																<td><?php echo $row['phone'] ?></td>
																<td><?php echo $row['status'] ?></td>
																<td>  
																	
																	<a href="viewpatient.php?patientId=<?php echo $row['patientId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0 viewbtn" data-toggle="tooltip" data-original-title="View">     
																		<i class="fa fa-eye" id="viewbtn"></i>   
																	</a>
																</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>

											<!-- Pagination Links -->
											<ul class="pagination justify-content-end">
												<?php
													// Assuming $totalRows is now defined
													$totalPages = ceil($totalRows / $rowsPerPage);

													for ($i = 1; $i <= $totalPages; $i++) {
														echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
													}
												?>
											</ul>
										</div>
										<!-- TABLE WRAPPER -->

										

									</div>
									<!-- SECTION WRAPPER -->
									
								</div>
							</div>
							<!-- ROW-1 CLOSED -->
							
						
				
				<!-- CONTAINER CLOSED -->   

		
			</div>
		</div>
			
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
<?php include '../admin/footer.php'; ?>