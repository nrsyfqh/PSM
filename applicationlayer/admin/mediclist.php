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
								<h1 class="page-title">Medication</h1>
								
							</div>
							<div class="ml-auto pageheader-btn">
								
								<a href="medicadd.php" class="btn btn-secondary btn-icon text-white">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Medication
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
											<h3 class="card-title">Medication List</h3>
											<br>
											<div class="wd-200 mg-b-30">
												<div class="input-group">
													<input placeholder="Medication Name" id="name" name="searchName" class="form-control" />

													<div class="input-group-append">
														<button type="submit" class="btn btn-primary" onclick="validateSearchName()">Search</button>
													</div>
												</div>
											</div>																			
										</form>
									</div>
									<script>
										var nameRegex = /^[a-zA-Z\s]+$/;  // Define your regular expression for name validation

										function validateSearchName() {
											var nameInput = document.getElementById('name');

											if (!nameRegex.test(nameInput.value.trim())) {
												alert('Please enter a correct name');
											} else {
												// Perform the search action here (submit the form, make an AJAX request, etc.)
												// For example: document.getElementById('yourFormId').submit();
											}
										}
									</script>

									<div class="card-body">
										<div class="table-responsive">
											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-10p">Name</th>
														<th class="wd-10p">Description</th>
														<th class="wd-10p">Usage Guideline</th>
														<th class="wd-8p">Status</th>
														<th class="wd-8p">Actions</th>
													</tr>
												</thead>
												<tbody>
												<?php
												include("../../datalayer/server.php");

												// Use prepared statements to prevent SQL injection
												if ($_SERVER['REQUEST_METHOD'] == 'POST') {
													$searchName = '%' . mysqli_real_escape_string($mysqli, $_POST['searchName']) . '%';

													$stmt = $mysqli->prepare("SELECT medic.medicationId, admin.username, medic.name, medic.description, medic.usageguideline, medic.status
																		FROM admin
																		JOIN medication AS medic ON admin.adminId = medic.adminId
																		WHERE medic.name LIKE ?");
													$stmt->bind_param("s", $searchName);
													$stmt->execute();
													$results = $stmt->get_result();
													$stmt->close();
												} else {
													$results = mysqli_query($mysqli, "SELECT medic.medicationId, admin.username, medic.name, medic.description, medic.usageguideline, medic.status 
																					FROM admin 
																					JOIN medication AS medic ON admin.adminId = medic.adminId");
												}

												while ($row = mysqli_fetch_assoc($results)) {
												?>

                                                        <tr>
															<td><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['description'] ?></td>
                                                            <td><?php echo $row['usageguideline'] ?></td>
							    							<td><?php echo $row['status'] ?></td>
                                    
                                                            <td>
                                                            <a href="../../datalayer/medicationDelete.php?delete=<?php echo $row['medicationId']; ?>"class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete">
                                                                <i class="fa fa-trash"></i></a>
                                                            <a href="../../datalayer/medicationDelete.php?active=<?php echo $row['medicationId']; ?>"class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Active">
																<i class="fa fa-check"></i></a>                                                  
                                                                <a href="javascript:UpdateEdit(<?php echo $row['medicationId']; ?>)" class="btn btn-default btn-sm mb-2 mb-xl-0 editbtn" data-toggle="tooltip" data-original-title="Edit"> 	
                                                              	<i class="fa fa-pencil editbtn" id = "editbtn"></i>  
                                                            </td>
                                                        </tr>

                                                    <?php } ?>

                                                    <style>
                                                        .btn.btn-default.btn-sm.mb-2.mb-xl-0:hover{
                                                            color: white;
                                                            background-color: blue;

                                                            transition: 0.3s;
                                                        }
                                                    </style>

												</tbody>
											</table>
										</div>

									</div>
									<!-- TABLE WRAPPER -->

                                    

								</div>
								<!-- SECTION WRAPPER -->
                                
							</div>
						</div>
						<!-- ROW-1 CLOSED -->
                        
						<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"> Edit Medication Data </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<form action="../../datalayer/medicationUpdate.php" method="POST">

										<div class="modal-body">

											<input type="hidden" name="medicationId" id="medicationId">
									
											<div class="form-group">
												<label> Name </label>
												<input type="text" name="name" id="name" class="form-control"
													placeholder="Name">
											</div>

											<div class="form-group">
												<label> Description </label>
												<input type="text" name="description" id="description" class="form-control"
													placeholder="Description">
											</div>

											<div class="form-group">
												<label> Usage Guideline </label>
												<input type="text" name="guideline" id="guideline" class="form-control"
													placeholder="Usage Guideline">
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" name="medicUpdate" class="btn btn-primary">Update Data</button>
										</div>
									</form>

								</div>
							</div>
						</div>

						<script>
							function validateEditForm() {
								var nameInput = document.getElementById('name');
								var descriptionInput = document.getElementById('description');
								var guidelineInput = document.getElementById('guideline');

								if (!nameInput.value.trim() || !descriptionInput.value.trim() || !guidelineInput.value.trim()) {
									alert('Please fill in all the required fields.');
									event.preventDefault();
								}
							}

							function UpdateEdit(medicationId) {
								$(document).ready(function () {

									$('.editbtn').on('click', function () {

										$('#editmodal').modal('show');

										$tr = $(this).closest('tr');

										var data = $tr.children("td").map(function () {
											return $(this).text();
										}).get();

										console.log(data);

										// Set the medicationId in the hidden input field
										$('#medicationId').val(medicationId);
										$('#name').val(data[0]);
										$('#description').val(data[1]);
										$('#guideline').val(data[2]);
									});
								});
							}
						</script>		

				<!--EDIT POP UP FORM (Bootstrap MODAL) -->	
				
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
<?php include 'footer.php'; ?>