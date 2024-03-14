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

<!-- FAVICON -->
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

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
<link href="../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

<!-- CUSTOM SCROLL BAR CSS-->
<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

<!-- INTERNAL FULL CALENDAR CSS -->
<link href='../assets/plugins/fullcalendar/fullcalendar.css' rel='stylesheet'/>
<link href='../assets/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'/>

<!--- FONT-ICONS CSS -->
<link href="../assets/css/icons.css" rel="stylesheet"/>

<!-- SIDEBAR CSS -->
<link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

<!-- COLOR SKIN CSS -->
<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

	<!-- <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script> -->

	    <!-- Example: -->
<!-- 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->

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

	<!-- INTERNAL  TIME PICKER CSS -->
	<link href="../assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet"/>

	<!-- INTERNAL  DATE PICKER CSS-->
	<link href="../assets/plugins/date-picker/spectrum.css" rel="stylesheet"/>


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
								<h1 class="page-title">Schedule Doctor</h1>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW OPEN -->
						<div class="container py-5" id="page-container">
							<div class="row">
								<div class="col-md-9">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">View Schedule Doctor</h3>
										</div>
										<div class="card-body">
											<div id='calendar'></div>
										</div>
									</div>
								</div>
						

						<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Schedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div> -->
									<div class="col-md-3">
									<div class="card rounded-0 shadow">
										<div class="card-header bg-gradient bg-primary text-light">
											<h5 class="card-title">Schedule Form</h5>
										</div>
                                    <div class="modal-body">
                                        <!-- Form start -->
                                        <form action="../../datalayer/schedule.php" method="post" class="needs-validation" novalidate onsubmit="return validateForm();" id = "schedule-form">
                                            <?php include("../../datalayer/server.php"); ?>

                                            <div class="form-group">
                                                <label class="control-label requiredField" for="doctor">Select Doctor</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <select class="custom-select" id="doctor" name="doctorId" required>
                                                        <option value="" disabled selected>Select your doctor</option>
                                                        <?php
                                                        require("../../datalayer/server.php");
                                                        $sqlOption = "SELECT doctorId, name FROM doctor WHERE Status = 'Active'";
                                                        $result = mysqli_query($mysqli, $sqlOption);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='" . $row['doctorId'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a doctor.</div>
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
                                                    <input class="form-control fc-datepicker" id="date" name="date" placeholder="YYYY-MM-DD" type="text" required>
                                                    <div class="invalid-feedback">Please provide a date.</div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label requiredField" for="dayDisplay">Day</label>
                                                <input class="form-control" id="dayDisplay" name="dayDisplay" type="text" readonly value="">
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label requiredField" for="startTime">Start Time</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" id="tp3" name="startTime" placeholder="Set start time" type="text" required>
                                                    <div class="invalid-feedback">Please set a start time.</div>
													<br>
                                                    <!-- <button type="button" class="btn btn-primary br-tl-0 br-bl-0" id="setStartTimeButton">Set Current Time</button> -->
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
                                                    <input class="form-control" id="tp4" name="endTime" placeholder="Set end time" type="text" required>
                                                    <div class="invalid-feedback">Please set an end time.</div>
                                                    <!-- <button type="button" class="btn btn-primary br-tl-0 br-bl-0" id="setEndTimeButton">Set Current Time</button> -->
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="updatedata" class="btn btn-primary">Add Schedule</button>
                                            </div>
                                        </form>
                                        <!-- Form end -->

										<!-- Event Details Modal -->
										<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content rounded-0">
													<div class="modal-header rounded-0">
														<h5 class="modal-title">Schedule Details</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body rounded-0">
														<div class="container-fluid">
															<dl>
																<dt class="text-muted">Doctor</dt>
																<dd id="title" class="fw-bold fs-4"></dd>
																<dt class="text-muted">Appointment Date</dt>
																<dd id="scheduleDate" class="fw-bold fs-4"></dd>
																<dt class="text-muted">Start Time</dt>
																<dd id="startTime" class=""></dd>
																<dt class="text-muted">End Time</dt>
																<dd id="endTime" class=""></dd>
															</dl>
														</div>
													</div>
													<div class="modal-footer rounded-0">
														<div class="text-end">
															<button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
															<button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
															<button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- Event Details Modal -->
                                    </div>

	

                                    <script>
                                        // Validation script for doctor dropdown
                                        function validateDoctorDropdown() {
                                            var doctorDropdown = document.getElementById('doctor');
                                            if (doctorDropdown.value === "") {
                                                doctorDropdown.classList.add('is-invalid');
                                                alert("Please select a doctor.");
                                                return false;
                                            } else {
                                                doctorDropdown.classList.remove('is-invalid');
                                                return true;
                                            }
                                        }

                                        // Validation script for date format
                                        function validateDateInput() {
                                            var dateInput = document.getElementById('date');
                                            var dateRegex = /^\d{4}-\d{2}-\d{2}$/;

                                            if (!dateRegex.test(dateInput.value.trim())) {
                                                alert('Invalid date format. Please use YYYY-MM-DD.');
                                                return false;
                                            }

                                            return true;
                                        }

                                        // Validation script for time inputs
                                        function validateTimeInputs() {
                                            var startTimeInput = document.getElementById('tp3');
                                            var endTimeInput = document.getElementById('tp4');

                                            // Assuming your time validation logic here

                                            // Example: Check if start time is before end time
                                            var startTime = new Date("2000-01-01 " + startTimeInput.value);
                                            var endTime = new Date("2000-01-01 " + endTimeInput.value);

                                            if (startTime >= endTime) {
                                                alert('Start time must be before end time.');
                                                return false;
                                            }

                                            return true;
                                        }

                                        // Function to validate the entire form
                                        function validateForm() {
                                            if (validateDoctorDropdown() && validateDateInput() && validateTimeInputs()) {
                                                // If validation passes, submit the form
                                                document.querySelector('form').submit();
                                            } else {
                                                // If validation fails, return false to prevent form submission
                                                return false;
                                            }
                                        }
                                    </script>
								<script>
									 // THis is for add schedule
									// Initialize the datepicker
									$('.fc-datepicker').datepicker({
										format: 'yyyy-mm-dd',
										autoclose: true,
									}).on('changeDate', function (e) {
										// Extract the selected date
										var selectedDate = e.date;

									// Get the day name (e.g., Monday, Tuesday)
									var dayName = getDayName(selectedDate);

									// Update the dayDisplay element
									$('#dayDisplay').val( dayName);
								});

								// Function to get the day name from a Date object
								function getDayName(date) {
                                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                var dayIndex = date.getDay();
                                return daysOfWeek[dayIndex];
                            }


								// Time picker initialization
                                var currentTimePicker = $('#tp3').timepicker({
                                    showInputs: false,
                                    minuteStep: 30  //set 30 minutes each step
                                });

                                // Handle "Set Current Time" button click
                                $('#setStartTimeButton').click(function () {
                                    var currentTime = new Date();
                                    var hours = currentTime.getHours();
                                    var minutes = currentTime.getMinutes();

                                    // Format the current time as "HH:mm"
                                    var currentTimeString = (hours < 10 ? "0" : "") + hours + ":" + (minutes < 10 ? "0" : "") + minutes;

                                    // Set the time in the time picker
                                    currentTimePicker.timepicker('setTime', currentTimeString);
                                });


                                // END TIME
                                // Time picker initialization
                                var currentEndTimePicker = $('#tp4').timepicker({
                                    showInputs: false,
                                    minuteStep: 30  //set 30 minutes each step
                                });

                                // Handle "Set Current Time" button click
                                $('#setEndTimeButton').click(function () {
                                    var currentEndTime = new Date();
                                    var Endhours = currentEndTime.getHours();
                                    var Endminutes = currentEndTime.getMinutes();

                                    // Format the current time as "HH:mm"
                                    var currentEndTimeString = (Endhours < 10 ? "0" : "") + Endhours + ":" + (Endminutes < 10 ? "0" : "") + Endminutes;

                                    // Set the time in the time picker
                                    currentEndTimePicker.timepicker('setTime', currentEndTimeString);
                                });
                            </script>
                                </div>
                            </div>
                        </div>
							</div>
						</div>

						<script>
							$(document).ready(function() {
								$('#calendar').fullCalendar({
									header: {
										left: 'prev,next today',
										center: 'title',
										right: 'month,agendaWeek,agendaDay,listMonth'
									},
									navLinks: true,
									businessHours: true,
									editable: true,
									events: events, // Use the PHP array directly
									eventRender: function(event, element) {
										// Customize the rendering of each event if needed
									},
									eventClick: function(event) {
										// Handle event click
										openEditModal(event);
									}
								});

								// Function to open the edit modal with event details
								function openEditModal(event) {
									// Populate the modal with event details
									$('#title').text(event.title);
									$('#scheduleDate').text(event.scheduleDate);
									$('#startTime').text(event.startTime);
									$('#endTime').text(event.endTime); // Corrected line
									// Add more lines to populate other fields based on your event properties

									// Set the data-id attribute to the event ID
									$('#edit').attr('data-id', event.id);

									// Open the edit modal
									$('#event-details-modal').modal('show');
								}
							});

							// Edit Button
							$('#edit').click(function() {
								var id = $(this).attr('data-id')
									if (!!event) {
										var _form = $('#schedule-form');
										_form.find('[name="doctorId"]').val(event.title);
										_form.find('[name="date"]').val(event.scheduleDate);
										_form.find('[name="startTime"]').val(event.startTime);
										_form.find('[name="endTime"]').val(event.endTime);
										
										$('#event-details-modal').modal('hide');
										_form.find('[name="doctorId"]').focus();

									} else {
										alert("Event is undefined");
									}
							})

						</script>

						

						<?php
						require("../../datalayer/server.php");
						// Fetch events from the schedule table
						$sql = "SELECT sch.scheduleId, doctor.name, sch.date, sch.day, sch.startTime, sch.endTime, sch.avail 
						FROM doctor 
						JOIN schedule AS sch ON doctor.doctorId = sch.doctorId";
						$result = mysqli_query($mysqli, $sql);

						// Convert the result to an array of events
						$events = array();
						while ($row = $result->fetch_assoc()) {
							$events[] = array(
								'id' => $row['scheduleId'], 
								'title' => $row['name'], 
								'date' => $row['date'] . ' ' . $row['startTime'],
								'scheduleDate' => $row['date'],
								'startTime' => $row['startTime'],
								'endTime' => $row['endTime'],
								'color' => '#22c865' // Set your desired color
								// 'textColor' => '#000000' // Set the font color to black
							);
						}

						// Output the events in JSON format
						echo '<script>var events = ' . json_encode($events) . ';</script>';
						?>

						<script>
						// Add the fetched events to the calendar
						$(document).ready(function() {
						$('#calendar').fullCalendar('addEventSource', events);
						});
						</script>
					
			
			</div>
		</div>		


		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="../assets/js/jquery-3.4.1.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

		<!-- SPARKLINE JS -->
		<script src="../assets/js/jquery.sparkline.min.js"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="../assets/js/circle-progress.min.js"></script>

		<!-- RATING STAR JS -->
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- EVA-ICONS JS -->
		<script src="../assets/iconfonts/eva.min.js"></script>

		<!-- INPUT MASK JS-->
		<script src="../assets/plugins/input-mask/jquery.mask.min.js"></script>

		<!-- INTERNAL FULL CALENDAR JS -->
		<script src='../assets/plugins/fullcalendar/moment.min.js'></script>
		<script src='../assets/plugins/fullcalendar/jquery-ui.min.js'></script>
		<script src='../assets/plugins/fullcalendar/fullcalendar.min.js'></script>
		<script src="../assets/js/fullcalendar.js"></script>

        <!-- SIDE-MENU JS-->
		<script src="../assets/plugins/sidemenu/sidemenu.js"></script>

		<!-- PERFECT SCROLL BAR js-->
		<script src="../assets/plugins/p-scroll/perfect-scrollbar.min.js"></script>
		<script src="../assets/plugins/sidemenu/sidemenu-scroll.js"></script>

		<!-- CUSTOM SCROLL BAR JS-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- SIDEBAR JS -->
		<script src="../assets/plugins/sidebar/sidebar.js"></script>

		<!-- CUSTOM JS-->
		<script src="../assets/js/custom.js"></script>

        
    </body>
</html>
<?php include 'footer.php'; ?>