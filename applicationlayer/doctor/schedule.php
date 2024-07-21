<?php 
	include('../../datalayer/server.php');

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION["username"])){
		header("location: ../logindoctor.php");
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
							<!-- <div class="ml-auto pageheader-btn">
								
								<a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-secondary btn-icon text-white">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Schedule
								</a>
                                
							</div> -->
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
                                <div class="card-header">
                                        <form method="post" action="">
                                            <br>
                                            <h3 class="card-title">Schedule List</h3>
                                            <br>
                                            <div class="wd-200 mg-b-30">
                                                <div class="input-group">
                                                    <input placeholder="YYYY-MM-DD" id="searchdate" name="searchDate" class="form-control" />

                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-primary" onclick="validateSearchDate()">Search</button>
                                                    </div>
                                                </div>
                                            </div>                                                                   
                                        </form>
                                    </div>
                                    <script>
                                        function validateSearchDate() {
                                            var dateInput = document.getElementById('searchdate');
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
										<div class="table-responsive">
											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
                                                        
                                                        <th class="wd-15p">Doctor</th>
                                                        <th class="wd-15p">Date</th>
														<th class="wd-20p">Day</th>
														<th class="wd-15p">Start Time</th>
                                                        <th class="wd-15p">End Time</th>
                                                        <th class="wd-15p">Status</th>
                                                        <th class="wd-15p">Actions</th>
													</tr>
												</thead>
												<tbody>
                                                    <?php 
                                                        include("../../datalayer/server.php");

                                                        date_default_timezone_set('Asia/Kuala_Lumpur');
        
                                                        // Set the default date to the current date
                                                        $currentDate = date("Y-m-d");
        
                                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                            // Get the search date from the form
                                                            $searchDate = $_POST["searchDate"];
        
                                                            // Validate the date format (YYYY-MM-DD)
                                                            if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $searchDate)) {
                                                                exit(); // Stop further execution
                                                            }
        
                                                                // Use the search date in the SQL query
                                                                $results = mysqli_query($mysqli, "SELECT sch.scheduleId, doctor.name, sch.date, sch.day, sch.startTime, sch.endTime, sch.avail 
                                                                FROM doctor 
                                                                JOIN schedule 
                                                                AS sch ON doctor.doctorId = sch.doctorId
                                                                WHERE (sch.avail  = 'Available' OR sch.avail  = 'Unavailable') AND sch.date = '$searchDate' AND doctor.username='$usernamelogged'");
                                                            
                                                                   
                                                            }else {

                                                                $results = mysqli_query($mysqli, "SELECT sch.scheduleId, doctor.name, sch.date, sch.day, sch.startTime, sch.endTime, sch.avail 
                                                                FROM doctor 
                                                                JOIN schedule 
                                                                AS sch ON doctor.doctorId = sch.doctorId
                                                                WHERE (sch.avail  = 'Available' OR sch.avail  = 'Unavailable') AND sch.date = '$currentDate' AND doctor.username='$usernamelogged'");
                                                   
                                                            }
                                                    ?>
                                                    <?php while ($row=mysqli_fetch_assoc($results)){ ?>

                                                        <tr>
                                                            
                                                            <td><?php echo $row['name'] ?></td>
                                                            <td><?php echo $row['date'] ?></td>
                                                            <td><?php echo $row['day'] ?></td>
                                                            <td><?php echo $row['startTime'] ?></td>
                                                            <td><?php echo $row['endTime'] ?></td>
                                                            <td><?php echo $row['avail'] ?></td>
                                    
                                                            <td>
                                                            <a href="../../datalayer/scheduleDelete.php?deleteSch=<?php echo $row['scheduleId']; ?>"class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete">
                                                                <i class="fa fa-trash"></i></a>
                                                            <a href="../../datalayer/scheduleDelete.php?activeSch=<?php echo $row['scheduleId']; ?>"class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Active">
                                                                <i class="fa fa-check"></i></a>                                                  
                                                            <a href="javascript:UpdateEdit(<?php echo $row['scheduleId']; ?>)" class="btn btn-default btn-sm mb-2 mb-xl-0 editbtn" data-toggle="tooltip" data-original-title="Edit"> 	
                                                                <i class="fa fa-pencil editbtn" id = "editbtn"></i></a>
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
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Schedule</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form start -->
                                        <form action="../../datalayer/scheduleDoctor.php" method="post" class="needs-validation" novalidate onsubmit="return validateForm();">
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
                                                        $sqlOption = "SELECT doctorId, name FROM doctor WHERE Status = 'Active' AND username = '$usernamelogged'";
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
                                                    <button type="button" class="btn btn-primary br-tl-0 br-bl-0" id="setStartTimeButton">Set Current Time</button>
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
                                                    <button type="button" class="btn btn-primary br-tl-0 br-bl-0" id="setEndTimeButton">Set Current Time</button>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="updatedata" class="btn btn-primary">Add Schedule</button>
                                            </div>
                                        </form>
                                        <!-- Form end -->
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
                                </div>
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

									<form action="../../datalayer/scheduleUpdate.php" method="POST">

										<div class="modal-body">

											<input type="hidden" name="scheduleId" id="scheduleId">

                                            <div class="form-group">
                                                <label class="control-label requiredField">Selected Doctor</label>
                                                <input class="form-control" id="name" name="name" type="text" readonly>
                                            </div>
									
											<div class="form-group">
                                                <label class="control-label requiredField" for="currentdate">Date</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control fc-datepicker updateSchedule" id="currentdate" name="currentdate" placeholder="YYYY-MM-DD" type="text" required>
                                                    <div class="invalid-feedback">Please provide a date.</div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label requiredField" for="day">Day</label>
                                                <input class="form-control" id="day" name="currentday" type="text" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label requiredField" for="startTime">Start Time</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-clock-o tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control" id="tp1" name="currentstartTime" placeholder="Set start time" type="text" required>
                                                    <div class="invalid-feedback">Please set a start time.</div>
                                                    <button type="button" class="btn btn-primary br-tl-0 br-bl-0" id="setStartTimeButton">Set Current Time</button>
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
                                                    <input class="form-control" id="tp2" name="currentendTime" placeholder="Set end time" type="text" required>
                                                    <div class="invalid-feedback">Please set an end time.</div>
                                                    <button type="button" class="btn btn-primary br-tl-0 br-bl-0" id="setEndTimeButton">Set Current Time</button>
                                                </div>
                                            </div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeButton" >Close</button>
											<button type="submit" name="schDocUpdate" class="btn btn-primary">Update Data</button>
										</div>
									</form>

								</div>
							</div>
						</div>



                        <br /><br/>
                        </div>
                        
						
				
				<!-- CONTAINER CLOSED -->   
                	<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
		
						<script>
                           document.getElementById("closeButton").addEventListener("click", function () {
                                // Clear the input field's value
                                document.getElementById("dayDisplay").value = "";
                            });
							function UpdateEdit(scheduleId){
								$(document).ready(function () {

									$('.editbtn').on('click', function () {

										$('#editmodal').modal('show');

										$tr = $(this).closest('tr');

										var data = $tr.children("td").map(function () {
											return $(this).text();
										}).get();

										console.log(data);

										//$('#id').val(data[0]);
                                        $('#scheduleId').val(scheduleId);
										$('#name').val(data[0]);
										$('#currentdate').val(data[1]);
										$('#day').val(data[2]);
                                        $('#tp1').val(data[3]);
                                        $('#tp2').val(data[4]);
									});
								});
							}
						</script>

                            <!--THis is the script function contains for add schedule-->     
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


                        <!--THis is the script function contains for update schedule-->     
                        <script>
                            // THis is for add schedule
                            // Initialize the datepicker
                            $('.fc-datepicker.updateSchedule').datepicker({
                                format: 'yyyy-mm-dd',
                                autoclose: true,
                            }).on('changeDate', function (e) {
                                // Extract the selected date
                                var selectedDate = e.date;

                                // Get the day name (e.g., Monday, Tuesday)
                                var dayName = getDayName(selectedDate);

                                // Update the dayDisplay element
                                $('#day').val( dayName);
                            });



                            // Function to get the day name from a Date object
                            function getDayName(date) {
                                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                var dayIndex = date.getDay();
                                return daysOfWeek[dayIndex];
                            }


                                // Time picker initialization
                                var currentTimePicker = $('#tp1').timepicker({
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
                                var currentEndTimePicker = $('#tp2').timepicker({
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