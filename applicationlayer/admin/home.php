<?php 
	include('../../datalayer/server.php');
?>
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


<?php include 'header.php'; ?>
<!doctype html>
<html lang="en" dir="ltr">
<head>

<!-- META DATA -->
<!-- <meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'> -->
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Yoha –  HTML5 Bootstrap Admin Template">
<meta name="author" content="Spruko Technologies Private Limited">
<meta name="keywords" content="admin dashboard html template, admin dashboard template bootstrap 4, analytics dashboard templates, best admin template bootstrap 4, best bootstrap admin template, bootstrap 4 template admin, bootstrap admin template premium, bootstrap admin ui, bootstrap basic admin template, cool admin template, dark admin dashboard, dark admin template, dark dashboard template, dashboard template bootstrap 4, ecommerce dashboard template, html5 admin template, light bootstrap dashboard, sales dashboard template, simple dashboard bootstrap 4, template bootstrap 4 admin">

<!-- FAVICON -->
<!-- <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" /> -->

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

		<!-- INTERNAL C3 CHARTS CSS -->
		<!-- <link href="../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/> -->

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="../assets/css/icons.css" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

		<!-- Include C3.js and D3.js -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
		<script src="https://d3js.org/d3.v5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
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
				<!--app-content open-->
				<div class="app-content">
					<div class="side-app">

						<!-- PAGE-HEADER -->
						<div class="page-header">
							<div>
								<h1 class="page-title">Dashboard Overview</h1>
							
							</div>
							<div class="ml-auto pageheader-btn">
								<a href="appointmentlist.php" class="btn btn-blue btn-icon text-white mr-2 bg-blue">
									<span>
										<i class="fe fe-plus"></i>
									</span> Make an Appointment
								</a>
								<a href="patientadd.php" class="btn btn-orange btn-icon text-white">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Patient
								</a>
							</div>
						</div>
						<!-- PAGE-HEADER END -->
					
						<!-- Row1 -->
						<div class="row">
							<div class="col-xl-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="d-flex mb-0">
											<span class="brround align-self-center avatar-lg br-3 cover-image bg-red">
												<i class="fe fe-user"></i>
											</span>
											<div class="svg-icons text-right ml-auto">
												<p class="text-muted mb-2" name>Patients Today</p>
												<?php 
												// Set the time zone to Malaysia Standard Time
												date_default_timezone_set('Asia/Kuala_Lumpur');
												
												// Get the current date in the format YYYY-MM-DD
												$currentDate = date("Y-m-d");

												// Construct the SQL query to get appointments for the current date
												$sql_total_appointment = "SELECT * FROM appointment a JOIN schedule s ON a.scheduleId = s.scheduleId WHERE s.date = '$currentDate';";
												
												// Execute the query
												$results_total_appointment = mysqli_query($mysqli, $sql_total_appointment);

												// Get the total number of appointments for the current date
												$total_appointment = mysqli_num_rows($results_total_appointment);
												?>
												<h2 class="mb-0 number-font"><?php echo $total_appointment; ?></h2>
												<p class="text-muted mb-0">Today <?php echo $currentDate; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-xl-3 col-sm-6">
								<div class="card overflow-hidden">
									<div class="card-body text-center">
										<div class="d-flex mb-0">
											<span class="brround align-self-center avatar-lg br-3 cover-image bg-blue">
												<i class="fe fe-users text-white"></i>
											</span>
											<div class="svg-icons text-right ml-auto">
												<p class="text-muted mb-2">Total Patients</p>
												<?php 
												$sql_total_patient ="SELECT * FROM patient";;
												$results_total_patient = mysqli_query($mysqli, $sql_total_patient);
												$total_patient = mysqli_num_rows($results_total_patient);?>
												<h2 class="mb-0 number-font"><?php echo $total_patient; ?></h2>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6">
								<div class="card overflow-hidden">
									<div class="card-body text-center">
										<div class="d-flex mb-0">
											<span class="brround align-self-center avatar-lg br-3 cover-image bg-yellow">
												<i class="fa fa-stethoscope text-white"></i>
											</span>
											<div class="svg-icons text-right ml-auto">
												<p class="text-muted mb-2">Total Doctors</p>
												<?php 
												$sql_total_doctor ="SELECT * FROM doctor";;
												$results_total_doctor = mysqli_query($mysqli, $sql_total_doctor);
												$total_doctor = mysqli_num_rows($results_total_doctor);?>
												<h2 class="mb-0 number-font"><?php echo $total_doctor; ?></h2>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-sm-6">
								<div class="card overflow-hidden">
									<div class="card-body text-center">
										<div class="d-flex mb-0">
											<span class="brround align-self-center avatar-lg br-3 cover-image bg-green">
												<i class="fe fe-check text-white"></i>
											</span>
											<div class="svg-icons text-right ml-auto">
												<p class="text-muted mb-2">Total Appointment Done </p>
												<?php 
												$sql_total_appointment ="SELECT * FROM appointment WHERE status = 'Completed'";;
												$results_total_appointment = mysqli_query($mysqli, $sql_total_appointment);
												$total_appointment = mysqli_num_rows($results_total_appointment);?>
												<h2 class="mb-0 number-font"><?php echo $total_appointment; ?></h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						

							<!-- ROW-2 -->
							<div class="col-lg-8 col-md-12 col-sm-12 col-xl-9">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Patients Statistics</h3>
									</div>
									<div class="card-body">
										<div id="chart-monthly"></div>
									</div>
								</div>
							</div>

							<div class="col-xl-3 col-sm-6">
								<div class="card" style="height: 450px; overflow-y: auto;">
									<div class="card-header">
										<h3 class="card-title">Upcoming Appointments </h3>
									</div>
									<div class="card-body">
										<div class="activity-block">
											<table class="table table-bordered">
												<thead>
													<tr>

													</tr>
												</thead>
												<tbody>
													<?php
													include("../../datalayer/server.php");

													// Get the current date
													date_default_timezone_set('Asia/Kuala_Lumpur');

													// Get the current date in the format YYYY-MM-DD
													$currentDate = date("Y-m-d");
													$results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, c.date, c.startTime, c.endTime, d.name
																						FROM patient a  
																						JOIN appointment b ON a.patientId = b.patientId 
																						JOIN schedule c ON b.scheduleId = c.scheduleId 
																						JOIN treatment d ON d.treatmentId = b.treatmentId 
																						WHERE c.date > '$currentDate'
																						ORDER BY c.date ASC;");

													while ($row = mysqli_fetch_assoc($results)) {
														?>
														<tr>
															<td>
																<?php
																echo $row['patientName'] . '<br>';
																echo '<small class="text-muted">' . $row['name'] . '</small>' . '<br>';
																echo '<small class="text-muted">' . $row['date'] . ' ' . $row['startTime'] . '</small>';
																?>
															</td>
														</tr>
													<?php
													}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<!-- ROW-2 CLOSED -->

							<!-- ROW-4 OPEN -->
						
						</div>
						
						<!-- ROW-1 OPEN -->
						<div class="row">	
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title">Appointment List Today</h3>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-15p">Patient IC</th>
														<th class="wd-15p">Name</th>
														<th class="wd-20p">Day</th>
														<th class="wd-15p">Date</th>
														<th class="wd-15p">Start Time</th>
														<th class="wd-15p">End Time</th>
														<th class="wd-15p">Treatment</th>
														<th class="wd-15p">Status</th>
														<th class="wd-15p">Actions</th>
													</tr>
												</thead>
												<tbody>
													<?php
													include("../../datalayer/server.php");

													// Get the current date
													date_default_timezone_set('Asia/Kuala_Lumpur');
												
													// Get the current date in the format YYYY-MM-DD
													$currentDate = date("Y-m-d");

													$results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status FROM patient a 
															JOIN appointment b ON a.patientId = b.patientId 
															JOIN schedule c ON b.scheduleId = c.scheduleId 
															JOIN treatment d ON d.treatmentId = b.treatmentId
															WHERE c.date = '$currentDate'
															ORDER BY c.date DESC, c.startTime ASC;");
													?>
													<?php while ($row = mysqli_fetch_assoc($results)) { ?>

														<tr>
															<td><?php echo $row['patientId'] ?></td>
															<td><?php echo $row['patientName'] ?></td>
															<td><?php echo $row['day'] ?></td>
															<td><?php echo $row['date'] ?></td>
															<td><?php echo $row['startTime'] ?></td>
															<td><?php echo $row['endTime'] ?></td>
															<td><?php echo $row['name'] ?></td>
															<td><?php echo $row['status'] ?></td>

															<td>
																<a href="../../datalayer/appointmentDelete.php?cancelhome=<?php echo $row['appointmentId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Cancel">
                                                                <i class="fa fa-close"></i></a>
                                                            <a href="../../datalayer/appointmentDelete.php?confirmhome=<?php echo $row['appointmentId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Confirm">
                                                                <i class="fa fa-check"></i></a>  
                                                            <a href="javascript:UpdateEdit(<?php echo $row['appointmentId']; ?>)" class="btn btn-default btn-sm mb-2 mb-xl-0 editbtn" data-toggle="tooltip" data-original-title="Edit">
                                                                <i class="fa fa-pencil editbtn" id="editbtn"></i>
															</td>
														</tr>

													<?php } ?>

													<style>
														.btn.btn-default.btn-sm.mb-2.mb-xl-0:hover {
															color: white;
															background-color: blue;

															transition: 0.3s;
														}
													</style>

												</tbody>
											</table>
										</div>

										<!-- <ul class="pagination justify-content-end">
											<li class="page-item page-prev disabled">
												<a class="page-link" href="#" tabindex="-1">Prev</a>
											</li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#">4</a></li>
											<li class="page-item"><a class="page-link" href="#">5</a></li>
											<li class="page-item page-next">
												<a class="page-link" href="#">Next</a>
											</li>
										</ul> -->

									</div>
									<!-- TABLE WRAPPER -->



								</div>
								<!-- SECTION WRAPPER -->

							</div>
						</div>
                    <!-- ROW-1 CLOSED -->


					</div>
				</div>

				<!--Pop up to Edit Schedule-->
				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Edit Schedule Data </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="../../datalayer/appointmentUpdate.php" method="POST">

                                    <div class="modal-body">
                                        <input type="hidden" name="appointmentId" id="appointmentId">
                                        <input type="hidden" name="patientId" id="patientId">
                                        <div class="form-group">
                                            <label class="control-label requiredField" for="patient">Select Patient</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <select class="custom-select" id="patient" name="patientId" required>
                                                    <option value="" disabled selected>Select your patient</option>
                                                    <?php
                                                    require("../../datalayer/server.php");
                                                    $sqlOption = "SELECT patientId, name FROM patient WHERE Status = 'Active'";
                                                    $result = mysqli_query($mysqli, $sqlOption);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['patientId'] . "'>" . $row['patientId'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Please select a patient.</div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label requiredField" for="date">Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control fc-datepicker updateSchedule" id="cdate" name="cdate" type="text" readonly>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label requiredField" for="day">Day</label>
                                            <input class="form-control" id="day" name="day" type="text" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label requiredField" for="startTime">Start Time</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control" id="tp1" name="startTime" placeholder="Set start time" type="text" readonly>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label requiredField" for="endTime">End Time</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control" id="tp2" name="currentendTime" placeholder="Set end time" type="text" readonly>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label requiredField" for="doctor">Select Treatment</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                    </div>
                                                </div>
                                                <select class="custom-select" id="treatment" name="treatment" required>
                                                    <option value="" disabled selected>Select your treatment</option>
                                                    <?php
                                                    require("../../datalayer/server.php");
                                                    $sqlOption = "SELECT treatmentId, name FROM treatment WHERE Status = 'Active'";
                                                    $result = mysqli_query($mysqli, $sqlOption);
                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['treatmentId'] . "'>" . $row['name'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Please select a treatment.</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeButton">Close</button>
                                            <button type="submit" name="appUpdate" class="btn btn-primary">Update Data</button>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>



                <!-- CONTAINER CLOSED -->
                <!-- EDIT POP UP FORM (Bootstrap MODAL) -->

                <script>
                    document.getElementById("closeButton").addEventListener("click", function() {
                        // Clear the input field's value
                        document.getElementById("dayDisplay").value = "";
                    });

                    function UpdateEdit(appointmentId) {
                        $(document).ready(function() {

                            $('.editbtn').on('click', function() {

                                $('#editmodal').modal('show');

                                $tr = $(this).closest('tr');

                                var data = $tr.children("td").map(function() {
                                    return $(this).text();
                                }).get();

                                console.log(data);

                                //$('#id').val(data[0]);
                                $('#appointmentId').val(appointmentId);
                                $('#patientIC').val(data[0]);
                                $('#cdate').val(data[3]);
                                $('#day').val(data[2]);
                                $('#tp1').val(data[4]);
                                $('#tp2').val(data[5]);
                                $('#treatment').val(data[6]);
                            });
                        });
                    }
                </script>
		</div>
	</div>

	<script>
		// Fetch data from the server using AJAX
		async function fetchData() {
			const response = await fetch('../../datalayer/data.php');
			const data = await response.json();
			
			// Generate the chart
			var chart = c3.generate({
				bindto: '#chart-monthly',
				data: {
					json: data,
					keys: {
						x: 'dat', // x-axis data comes from the 'dat' field
						value: ['patients'] // y-axis data comes from the 'patients' field
					},
					type: 'bar',
				},
				axis: {
					x: {
						type: 'category',
						tick: {
							format: '%Y-%m'
						}
					}
				},
				bar: {
					width: 30
				},
				legend: {
					show: false
				},
				padding: {
					bottom: 0,
					top: 0
				},
			});
		}

		// Call the fetchData function
		fetchData();
	</script>


	<!-- BACK-TO-TOP -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

	<!-- JQUERY JS -->
	<script src="../assets/js/jquery-3.4.1.min.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

	<!-- SPARKLINE JS-->
	<script src="../assets/js/jquery.sparkline.min.js"></script>

	<!-- CHART-CIRCLE JS -->
	<!-- <script src="../assets/js/circle-progress.min.js"></script> -->

	<!-- RATING STAR JS-->
	<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

	<!-- EVA-ICONS JS -->
	<script src="../assets/iconfonts/eva.min.js"></script>

	<!-- INTERNAL C3 CHART JS -->
	<!-- <script src="../assets/plugins/charts-c3/d3.v5.min.js"></script>
	<script src="../assets/plugins/charts-c3/c3-chart.js"></script> -->

	<!-- INPUT MASK JS-->
	<script src="../assets/plugins/input-mask/jquery.mask.min.js"></script>

	<!-- SIDE-MENU JS-->
	<script src="../assets/plugins/sidemenu/sidemenu.js"></script>

	<!-- PERFECT SCROLL BAR js-->
	<script src="../assets/plugins/p-scroll/perfect-scrollbar.min.js"></script>
	<script src="../assets/plugins/sidemenu/sidemenu-scroll.js"></script>

	<!-- INTERNAL INDEX JS -->
	<!-- <script src="../assets/js/charts.js"></script> -->

	<!-- CUSTOM SCROLL BAR JS-->
	<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- SIDEBAR JS -->
	<script src="../assets/plugins/sidebar/sidebar.js"></script>

	<!-- CUSTOM JS-->
	<script src="../assets/js/custom.js"></script>

        
    </body>
</html>
<?php include 'footer.php'; ?>