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
								<h1 class="page-title">Doctor </h1>
								<!-- <?php echo $usernamelogged?>	 -->
								
							</div>
							<div class="ml-auto pageheader-btn">
								
								<a href="register.php" class="btn btn-secondary btn-icon text-white">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Doctor
								</a>
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
											<h3 class="card-title">List of Doctor</h3>
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

											// You can perform additional validation if needed

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

															$stmt = $mysqli->prepare("SELECT COUNT(*) as total FROM doctor
																					WHERE doctorId LIKE ? OR name LIKE ?");
															$stmt->bind_param("ss", $searchNameIC, $searchNameIC);
															$stmt->execute();
															$totalResult = $stmt->get_result();
															$totalRows = $totalResult->fetch_assoc()['total'];
															$stmt->close();

															$stmt = $mysqli->prepare("SELECT doctorId, name, email, phone, status FROM doctor
																					WHERE doctorId LIKE ? OR name LIKE ?
																					LIMIT ?, ?");
															$stmt->bind_param("ssii", $searchNameIC, $searchNameIC, $startRow, $rowsPerPage);
															$stmt->execute();
															$results = $stmt->get_result();
															$stmt->close();
														} else {
															$stmt = $mysqli->prepare("SELECT COUNT(*) as total FROM doctor");
															$stmt->execute();
															$totalResult = $stmt->get_result();
															$totalRows = $totalResult->fetch_assoc()['total'];
															$stmt->close();

															$stmt = $mysqli->prepare("SELECT doctorId, name, email, phone, status FROM doctor
																					LIMIT ?, ?");
															$stmt->bind_param("ii", $startRow, $rowsPerPage);
															$stmt->execute();
															$results = $stmt->get_result();
															$stmt->close();
														}
													?>

													<?php while ($row=mysqli_fetch_assoc($results)){ ?>
														<tr>
															<td><?php echo $row['doctorId'] ?></td>
															<td><?php echo $row['name'] ?></td>
															<td><?php echo $row['email'] ?></td>
															<td><?php echo $row['phone'] ?></td>
															<td><?php echo $row['status'] ?></td>
															<td>
																<a href="../../datalayer/doctorDelete.php?delete=<?php echo $row['doctorId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete">
																	<i class="fa fa-trash"></i>
																</a>
																<a href="../../datalayer/doctorDelete.php?active=<?php echo $row['doctorId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Active">
																	<i class="fa fa-check"></i>
																</a>                                                  
																<a href="javascript:UpdateEdit(<?php echo $row['doctorId']; ?>)" class="btn btn-default btn-sm mb-2 mb-xl-0 editbtn" data-toggle="tooltip" data-original-title="Edit">     
																	<i class="fa fa-pencil editbtn" id="editbtn"></i>   
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
                	<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
		<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"> Edit Doctor Data </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<form action="../../datalayer/doctorUpdate.php" method="POST">

										<div class="modal-body">

											<input type="hidden" name="doctorId" id="update_id">

											<div class="form-group">
												<label> Name </label>
												<input type="text" name="name" id="name" class="form-control"
													placeholder="Name">
											</div>

											<div class="form-group">
												<label> Email </label>
												<input type="text" name="email" id="email" class="form-control"
													placeholder="Email">
											</div>

											<div class="form-group">
												<label> Phone Number </label>
												<input type="text" name="phone" id="phone" class="form-control"
													placeholder="Phone">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
										</div>
									</form>

								</div>
							</div>
						</div>

						<script>
							function UpdateEdit(){
								$(document).ready(function () {

									$('.editbtn').on('click', function () {

										$('#editmodal').modal('show');

										$tr = $(this).closest('tr');

										var data = $tr.children("td").map(function () {
											return $(this).text();
										}).get();

										console.log(data);

										$('#update_id').val(data[0]);
										$('#name').val(data[1]);
										$('#email').val(data[2]);
										$('#phone').val(data[3]);
									});
								});
							}
						</script>
	

			
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
<?php include 'footer.php'; ?>