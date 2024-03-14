<?php 
	include('../../datalayer/server.php');

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION["username"])){
		header("location: ../loginadmin.php");
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

        <!-- Include Bootstrap CSS and JavaScript -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Include Bootstrap Datepicker CSS and JavaScript -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

        <!-- Include Bootstrap Timepicker CSS and JavaScript -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>


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

        <!-- INTERNAL  TIME PICKER CSS -->
		<link href="../assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet"/>

        <!-- INTERNAL  DATE PICKER CSS-->
        <link href="../assets/plugins/date-picker/spectrum.css" rel="stylesheet"/>

        <!--font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/font-awesome.min.css">

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
								<h1 class="page-title">Appointment</h1>	
							</div>
							<div class="ml-auto pageheader-btn">
								
								<!-- <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-secondary btn-icon text-white">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Appointment
								</a> -->
                                
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
                                            <h3 class="card-title">Appointment List</h3>
                                            <br>
                                            <div class="wd-200 mg-b-30">
                                                <div class="input-group">
                                                    <input placeholder="YYYY-MM-DD" id="date" name="searchDate" class="form-control" />

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary" onclick="validateSearchDate()">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                                                                                            
                                        </form>
                                    </div>
                                    <script>
                                        function validateSearchDate() {
                                            var dateInput = document.getElementById('date');
                                            var dateRegex = /^\d{4}-\d{2}-\d{2}$/;

                                            if (!dateRegex.test(dateInput.value.trim())) {
                                                alert('Please enter a valid date in the format YYYY-MM-DD.');
                                            } else {
                                                // Perform the search action here (submit the form, make an AJAX request, etc.)
                                                // For example: document.getElementById('yourFormId').submit();
                                            }
                                        }
                                    </script>
                                    <div class="card-body">
                                        <form method="post" action="">
                                        <?php
                                        // Set the default timezone to Kuala Lumpur
                                        date_default_timezone_set('Asia/Kuala_Lumpur');

                                        // Set the default date to today
                                        $currentDate = date("Y-m-d");

                                        // Calculate the next date by adding 1 day
                                        $nextDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
                                        ?>
                                        <input type="hidden" name="currentDate" value="<?php echo $currentDate; ?>">
                                        <div style="text-align: right;">
                                            <button type="submit" name="showToday" class="btn btn-primary">Today</button>
                                            <button type="submit" name="getNextDate" class="btn btn-primary">Tomorrow</button>
                                        </div>
                                    </form>

                                    <div style="text-align: left;">
                                        <?php
                                        if (isset($_POST["showToday"])) {
                                            echo "<p>Today: " . $currentDate . "</p>";
                                        } elseif (isset($_POST["getNextDate"])) {
                                            echo "<p>Tomorrow: " . $nextDate . "</p>";
                                        } else {
                                            // Display today's date by default
                                            echo "<p>Today: " . $currentDate . "</p>";
                                        }
                                        ?>
                                    </div>
                                        <br>
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
                                                        <th class="wd-15p">Doctor</th>
                                                        <th class="wd-15p">Status</th>
                                                        <th class="wd-15p">Actions</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php
                                                        include("../../datalayer/server.php");

                                                        date_default_timezone_set('Asia/Kuala_Lumpur');

                                                         // Check if the form is submitted
                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                            if (isset($_POST["getNextDate"])) {
                                                                // Get the current date from the hidden input field
                                                                $currentDate = $_POST["currentDate"];

                                                                // Get the current date from the hidden input field
                                                                $currentDate = date("Y-m-d");
                                                                
                                                                // Calculate the next date by adding 1 day
                                                                $nextDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));

                                                                // Fetch appointments for the next date without any limit
                                                                $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status, e.name AS doctorName 
                                                                    FROM patient a 
                                                                    JOIN appointment b ON a.patientId = b.patientId 
                                                                    JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                                    JOIN treatment d ON d.treatmentId = b.treatmentId
                                                                    JOIN doctor e ON e.doctorId = c.doctorId
                                                                    WHERE DATE(c.date) = '$nextDate' AND e.username='$usernamelogged'
                                                                    ORDER BY c.date DESC, c.startTime ASC;");

                                                            } elseif (isset($_POST["showToday"])) {
                                                                // Show today's appointments
                                                                $currentDate = date("Y-m-d");
                                                                $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status, e.name AS doctorName 
                                                                    FROM patient a 
                                                                    JOIN appointment b ON a.patientId = b.patientId 
                                                                    JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                                    JOIN treatment d ON d.treatmentId = b.treatmentId
                                                                    JOIN doctor e ON e.doctorId = c.doctorId
                                                                    WHERE DATE(c.date) = '$currentDate' AND e.username='$usernamelogged'
                                                                    ORDER BY c.date DESC, c.startTime ASC;"); 

                                                            } elseif (isset($_POST["searchDate"])) {
                                                                // Get the search date from the form
                                                                $searchDate = $_POST["searchDate"];

                                                                // Validate the date format (YYYY-MM-DD)
                                                                if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $searchDate)) {
                                                                    echo "Invalid date format.";
                                                                    exit(); // Stop further execution
                                                                }

                                                                // Use the search date in the SQL query
                                                                $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status, e.name AS doctorName 
                                                                    FROM patient a 
                                                                    JOIN appointment b ON a.patientId = b.patientId 
                                                                    JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                                    JOIN treatment d ON d.treatmentId = b.treatmentId
                                                                    JOIN doctor e ON e.doctorId = c.doctorId  -- Assuming 'doctorId' is the correct column for the join
                                                                    WHERE DATE(c.date) = '$searchDate' AND e.username = '$usernamelogged'
                                                                    ORDER BY c.date DESC, c.startTime ASC;");
                                                            } else {
                                                                echo "Invalid form submission.";
                                                            }

                                                            } else {
                                                                // If no form submission, display today's appointments
                                                                $currentDate = date("Y-m-d");
                                                                $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status, e.name AS doctorName
                                                                    FROM patient a 
                                                                    JOIN appointment b ON a.patientId = b.patientId 
                                                                    JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                                    JOIN treatment d ON d.treatmentId = b.treatmentId
                                                                    JOIN doctor e ON e.doctorId = c.doctorId
                                                                    WHERE DATE(c.date) = '$currentDate' AND e.username='$usernamelogged'
                                                                    ORDER BY c.date DESC, c.startTime ASC;");
                                                            }
                                                        ?>
                                                    
                                                    <?php while ($row=mysqli_fetch_assoc($results)){ ?>

                                                        <tr>
                                                            <td><?php echo $row['patientId'] ?></td>
                                                            <td><?php echo $row['patientName'] ?></td>
                                                            <td><?php echo $row['day'] ?></td>
                                                            <td><?php echo $row['date'] ?></td>
                                                            <td><?php echo $row['startTime'] ?></td>
                                                            <td><?php echo $row['endTime'] ?></td>
                                                            <td><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['doctorName'] ?></td>
                                                            <td><?php echo $row['status'] ?></td>

                                                            
                                                            <td>                                            
															<a href="javascript:UpdateEdit(<?php echo $row['appointmentId']; ?>)" class="btn btn-default btn-sm mb-2 mb-xl-0 editbtn" data-toggle="tooltip" data-original-title="Edit"> 	
                                                              	<i class="fa fa-pencil editbtn" id = "editbtn"></i></a>  
                                                            <a href="javascript:View(<?php echo $row['appointmentId']; ?>)" class="btn btn-default btn-sm mb-2 mb-xl-0 viewbtn" data-toggle="tooltip" data-original-title="View">
                                                                <i class="fa fa-eye viewbtn" id="viewbtn"></i></a>
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
                        <!-- Modal -->

                        <!--Pop up to Edit Appointment-->
                        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel"> Edit Appointment Data </h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<form action="../../datalayer/appointmentUpdate.php" method="POST">

										<div class="modal-body">

                                            <input type="text" style = "display: none" name="appointmentId" id="appointmentId" value ="<?php echo $row['appointmentId'] ?>">

                                            <div class="form-group">
                                                <label class="control-label requiredField" for="patientName">Patient Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="patientName" name = "patientName" class="form-control" readonly>
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
                                                <label class="control-label requiredField" for="treatment">Treatment</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="treatment" name = "treatment" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
												<label> Description </label>
												<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
											</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeButton" >Close</button>
											<button type="submit" name="appDocUpdate" class="btn btn-primary">Update Data</button>
										</div>
									</form>

								</div>
							</div>
						</div>

                    </div>
                </div>
                        

				<!-- CONTAINER CLOSED -->   
                	<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
						<script>
                           document.getElementById("closeButton").addEventListener("click", function () {
                                // Clear the input field's value
                                document.getElementById("dayDisplay").value = "";
                            });
							function UpdateEdit(appointmentId){
								$(document).ready(function () {

									$('.editbtn').on('click', function () {

										$('#editmodal').modal('show');

										$tr = $(this).closest('tr');

										var data = $tr.children("td").map(function () {
											return $(this).text();
										}).get();

										console.log(data);

										//$('#id').val(data[0]);
                                        $('#appointmentId').val(appointmentId);
                                        $('#patientName').val(data[1]);      
										$('#day').val(data[2]);
                                        $('#cdate').val(data[3]);
                                        $('#tp1').val(data[4]);
                                        $('#tp2').val(data[5]);
                                        $('#treatment').val(data[6]);

									});
								});
							}    

                            // Modify the JavaScript code for handling the "View" button click
                            function View(appointmentId) {
                                console.log('Sending AJAX request for appointmentId:', appointmentId);
                                $.ajax({
                                    type: "POST",
                                    url: "../../datalayer/description.php",
                                    data: { appointmentId: appointmentId },
                                    success: function(response) {
                                        console.log('Response from server:', response);
                                        $('#viewDescription').val(response);
                                        $('#viewmodal').modal('show');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                    }
                                });
                            }
                            </script>	

                        <!-- Pop up to View Description -->
                        <div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View Description</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label> Description </label>
                                            <textarea input class="form-control" id="viewDescription" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                                                
  
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

        <!-- INTERNAL  TIMEPICKER JS -->
        <script src="../assets/plugins/time-picker/jquery.timepicker.js"></script>
		<script src="../assets/plugins/time-picker/toggles.min.js"></script>

		<!-- INTERNAL DATEPICKER JS-->
		<script src="../assets/plugins/date-picker/spectrum.js"></script>
		<script src="../assets/plugins/date-picker/jquery-ui.js"></script>
		<script src="../assets/plugins/input-mask/jquery.maskedinput.js"></script>
        
    </body>
</html>
<?php include '../admin/footer.php'; ?>