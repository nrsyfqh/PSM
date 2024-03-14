<?php
include('../../datalayer/server.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["username"])) {
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
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/skin-modes.css" rel="stylesheet" />
    <link href="../assets/css/dark-style.css" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="../assets/css/closed-sidemenu.css" rel="stylesheet">

    <!--PERFECT SCROLL CSS-->
    <link href="../assets/plugins/p-scroll/perfect-scrollbar.css" rel="stylesheet" />

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="../assets/css/icons.css" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="../assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

    <!-- INTERNAL  TIME PICKER CSS -->
    <link href="../assets/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />

    <!-- INTERNAL  DATE PICKER CSS-->
    <link href="../assets/plugins/date-picker/spectrum.css" rel="stylesheet" />

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
                            <h1 class="page-title">Appointment</h1>
                        </div>
                        <div class="ml-auto pageheader-btn">

                            <a type="button" data-toggle="modal" data-target="#myModal" class="btn btn-secondary btn-icon text-white">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> Add Appointment
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
                                                    <th class="wd-15p">Date</th>
                                                    <th class="wd-20p">Day</th>
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
                                                        $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status FROM patient a 
                                                            JOIN appointment b ON a.patientId = b.patientId 
                                                            JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                            JOIN treatment d ON d.treatmentId = b.treatmentId
                                                            WHERE DATE(c.date) = '$nextDate'
                                                            ORDER BY c.date DESC, c.startTime ASC;");
                                                            

                                                    } elseif (isset($_POST["showToday"])) {
                                                        // Show today's appointments
                                                        $currentDate = date("Y-m-d");
                                                        $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status FROM patient a 
                                                            JOIN appointment b ON a.patientId = b.patientId 
                                                            JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                            JOIN treatment d ON d.treatmentId = b.treatmentId
                                                            WHERE DATE(c.date) = '$currentDate'
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
                                                        $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status FROM patient a 
                                                            JOIN appointment b ON a.patientId = b.patientId 
                                                            JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                            JOIN treatment d ON d.treatmentId = b.treatmentId
                                                            WHERE DATE(c.date) = '$searchDate'
                                                            ORDER BY c.date DESC, c.startTime ASC;");
                                                    } else {
                                                        echo "Invalid form submission.";
                                                    }
                                                } else {
                                                    // If no form submission, display today's appointments
                                                    $currentDate = date("Y-m-d");
                                                    $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status FROM patient a 
                                                        JOIN appointment b ON a.patientId = b.patientId 
                                                        JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                        JOIN treatment d ON d.treatmentId = b.treatmentId
                                                        WHERE DATE(c.date) = '$currentDate'
                                                        ORDER BY c.date DESC, c.startTime ASC;");
                                                }
                                                ?>

                                                <?php while ($row = mysqli_fetch_assoc($results)) { ?>

                                                    <tr>
                                                        <td><?php echo $row['patientId'] ?></td>
                                                        <td><?php echo $row['patientName'] ?></td>
                                                        <td><?php echo $row['date'] ?></td>
                                                        <td><?php echo $row['day'] ?></td>
                                                        <td><?php echo $row['startTime'] ?></td>
                                                        <td><?php echo $row['endTime'] ?></td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['status'] ?></td>

                                                        <td>
                                                            <a href="../../datalayer/appointmentDelete.php?cancel=<?php echo $row['appointmentId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Cancel">
                                                                <i class="fa fa-close"></i></a>
                                                            <a href="../../datalayer/appointmentDelete.php?confirm=<?php echo $row['appointmentId']; ?>" class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Confirm">
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

                                </div>
                                <!-- TABLE WRAPPER -->
                            </div>
                            <!-- SECTION WRAPPER -->

                        </div>
                    </div>
                    <!-- ROW-1 CLOSED -->

                    <!--Pop up for insert new appointment--->
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Appointment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form start -->
                                    <form id="yourFormId" action="../../datalayer/appointment.php" method="post" class="needs-validation" novalidate>
                                        <?php include("../../datalayer/server.php"); ?>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="control-label requiredField">Select Patient</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                            </div>
                                                        </div>
                                                        <select class="custom-select" id="patientfilter" name="patient" required>
                                                            <option value="" disabled selected>Select your patient</option>
                                                            <?php
                                                            require("../../datalayer/server.php");
                                                            $sqlOption = "SELECT patientId, name FROM patient WHERE Status = 'Active'";
                                                            $result = mysqli_query($mysqli, $sqlOption);
                                                            if ($result->num_rows > 0) {
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='" . $row['patientId'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a patient.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="control-label requiredField" for="date">Date</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control fc-datepicker" id="dateFilter" name="date" placeholder="YYYY-MM-DD" type="text" required>
                                                        <div class="invalid-feedback">Please provide a date.</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="control-label requiredField" for="dayDisplay">Day</label>
                                                    <input class="form-control" id="dayDisplay" name="dayDisplay" type="text" readonly value="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="control-label requiredField" for="doctor">Select Doctor</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fa fa-user-md tx-16 lh-0 op-6"></i>
                                                            </div>
                                                        </div>
                                                        <select class="custom-select" id="doctorfilter" name="doctor" required>
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
                                            </div>


                                            <div class="col">
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

                                            </div>
                                        </div>

                                        <style>
                                            .hovered {
                                                color: blue;
                                                /* Change to your desired hover color */
                                                font-weight: bold
                                            }

                                            .selected {
                                                color: red;
                                                font-weight: bold
                                            }
                                        </style>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var form = document.getElementById('yourFormId'); // Replace with your actual form ID
                                                var patientSelect = document.getElementById('patientfilter');
                                                var dateInput = document.getElementById('dateFilter');
                                                var doctorSelect = document.getElementById('doctorfilter');
                                                var treatmentSelect = document.getElementById('treatment');
                                                var selectedScheduleIdInput = document.getElementById('selected-schedule-id');

                                                form.addEventListener('submit', function (event) {
                                                    if (patientSelect.value === "") {
                                                        alert('Please select a patient.');
                                                        event.preventDefault();
                                                        return false;
                                                    }

                                                    var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                                                    if (!dateRegex.test(dateInput.value)) {
                                                        alert('Please provide a valid date in YYYY-MM-DD format.');
                                                        event.preventDefault();
                                                        return false;
                                                    }

                                                    if (doctorSelect.value === "") {
                                                        alert('Please select a doctor.');
                                                        event.preventDefault();
                                                        return false;
                                                    }

                                                    if (treatmentSelect.value === "") {
                                                        alert('Please select a treatment.');
                                                        event.preventDefault();
                                                        return false;
                                                    }

                                                    // Add validation for selected-schedule-id
                                                    if (selectedScheduleIdInput.value === "") {
                                                        alert('Please select an appointment schedule.');
                                                        event.preventDefault();
                                                        return false;
                                                    }
                                                });
                                            });
                                        </script>
                                        

                                        <!-- Add a hidden input field to store the selected scheduleId -->
                                        <br /><br />
                                        <input type="hidden" id="selected-schedule-id" name="selected-schedule-id" value="">
                                        <h5 class="modal-title" id="exampleModalLabel">Available Appointment List for Doctor: <span id="doctor_name">Doctor Name</span></h5>
                                        <br />
                                        <div class="table-responsive">
                                            <table id="data-table3" class="table table-striped table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Day</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Status</th>
                                                    </tr>

                                                    <!-- Add a placeholder row with an error message -->

                                                </thead>
                                                <tbody>

                                                    <?php
                                                    // PHP code to fetch and display appointments based on filters
                                                    include("../../datalayer/server.php");

                                                    // Initial query to fetch all available appointments
                                                    $initialSql = "SELECT * FROM schedule WHERE avail = 'Available'";
                                                    $results = mysqli_query($mysqli, $initialSql);

                                                    // Fetch all available appointments and store them in a PHP array
                                                    $availableAppointments = [];
                                                    while ($row = mysqli_fetch_assoc($results)) {
                                                        $availableAppointments[] = $row;
                                                        // Display all available appointments by default
                                                        echo '<tr>';
                                                        echo '<td class="schedule-id" style="display: none;">' . $row['scheduleId'] . '</td>';
                                                        echo '<td>' . $row['date'] . '</td>';
                                                        echo '<td>' . $row['day'] . '</td>';
                                                        echo '<td>' . $row['startTime'] . '</td>';
                                                        echo '<td>' . $row['endTime'] . '</td>';
                                                        echo '<td>' . $row['avail'] . '</td>';
                                                        // Add a hidden input field to store the id value
                                                        echo '<input type="hidden" class="row-id" value="' . $row['scheduleId'] . '">';
                                                        echo '</tr>';
                                                    }
                                                    // PHP code to display records or show an error message
                                                    $noRecordsFound = true;
                                                    foreach ($availableAppointments as $appointment) {
                                                        // Your existing code for displaying appointments here
                                                        $noRecordsFound = false;
                                                    }

                                                    if ($noRecordsFound) {
                                                        // Display a placeholder row with an error message
                                                        echo '<tr>';
                                                        echo '<td colspan="4">No records found for the selected date.</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                            <script>
                                                // Function to handle row selection
                                                $(document).ready(function() {
                                                    // Event listener to handle row hover
                                                    $("#data-table3 tbody tr").hover(
                                                        function() {
                                                            $(this).addClass("hovered");
                                                        },
                                                        function() {
                                                            $(this).removeClass("hovered");
                                                        }
                                                    );

                                                    // Event listener to handle row click
                                                    $("#data-table3 tbody").on("click", "tr", function() {
                                                        // Remove the "selected" class from all rows
                                                        $("#data-table3 tbody tr").removeClass("selected");

                                                        // Add the "selected" class to the clicked row
                                                        $(this).addClass("selected");

                                                        // Get the schedule ID from the hidden input field in the clicked row
                                                        var scheduleId = $(this).find('td:first').val();

                                                        // Display the scheduleId value in the hidden input field
                                                        $("#selected-schedule-id").val(scheduleId);
                                                    });
                                                });
                                            </script>
                                            <div class="modal-footer modal-lg">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Appointment</button>
                                            </div>
                                        </div>

                                        <script>
                                            // Function to update the table based on the selected doctor
                                            function updateTableByDoctor(selectedDoctor) {
                                                var tableBody = document.getElementById("data-table3").getElementsByTagName("tbody")[0];
                                                tableBody.innerHTML = "";

                                                // Check if there are no records for the selected date
                                                var noRecordsFoundRow = document.getElementById("noRecordsFound");


                                                <?php

                                                foreach ($availableAppointments as $appointment) {
                                                    echo "var appointmentDoctor = " . $appointment['doctorId'] . ";";
                                                    echo "if (appointmentDoctor == selectedDoctor) {";
                                                    echo "tableBody.innerHTML += '<tr>' + 
                                                            '<td class=\"schedule-id\" style=\"display: none;\">' + '" . $appointment['scheduleId'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['date'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['day'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['startTime'] . "' + '</td>' +
                                                            '<td>' + '" . $appointment['endTime'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['avail'] . "' + '</td>'  + '</tr>';";

                                                    echo "}";
                                                }

                                                ?>

                                                // Event listener to handle row hover
                                                $("#data-table3 tbody tr").hover(
                                                    function() {
                                                        $(this).addClass("hovered");
                                                    },
                                                    function() {
                                                        $(this).removeClass("hovered");
                                                    }
                                                );

                                                // Event listener to handle row click
                                                $("#data-table3 tbody").on("click", "tr", function() {
                                                    // Remove the "selected" class from all rows
                                                    $("#data-table3 tbody tr").removeClass("selected");

                                                    // Add the "selected" class to the clicked row
                                                    $(this).addClass("selected");

                                                    // Get the id value of the selected row
                                                    var selectedId = $(this).find('.schedule-id').text();

                                                    // Assign the selectedId to a hidden input field for form submission
                                                    $("#selected-schedule-id").val(selectedId);
                                                });

                                            }

                                            // Event listener for doctor filter change
                                            document.getElementById("doctorfilter").addEventListener("change", function() {
                                                var selectedDoctor = this.value;
                                                updateTableByDoctor(selectedDoctor);

                                            });

                                            // Function to update the table based on the selected date
                                            function updateTable(selectedDate) {
                                                var tableBody = document.getElementById("data-table3").getElementsByTagName("tbody")[0];
                                                tableBody.innerHTML = "";

                                                <?php
                                                foreach ($availableAppointments as $appointment) {
                                                    echo "var appointmentDate = '" . $appointment['date'] . "';";
                                                    echo "if (appointmentDate === selectedDate) {";
                                                    echo "tableBody.innerHTML += '<tr>'  + 
                                                                '<td class=\"schedule-id\" style=\"display: none;\">' + '" . $appointment['scheduleId'] . "' + '</td>' + 
                                                                '<td>' + '" . $appointment['date'] . "' + '</td>' +
                                                                '<td>' + '" . $appointment['day'] . "' + '</td>' + 
                                                                '<td>' + '" . $appointment['startTime'] . "' + '</td>' + 
                                                                '<td>' + '" . $appointment['endTime'] . "' + '</td>' + 
                                                                '<td>' + '" . $appointment['avail'] . "' + '</td>' + '</tr>';";
                                                    echo "}";
                                                }


                                                ?>

                                                // Event listener to handle row hover
                                                $("#data-table3 tbody tr").hover(
                                                    function() {
                                                        $(this).addClass("hovered");
                                                    },
                                                    function() {
                                                        $(this).removeClass("hovered");
                                                    }
                                                );

                                                // Event listener to handle row click
                                                $("#data-table3 tbody").on("click", "tr", function() {
                                                    // Remove the "selected" class from all rows
                                                    $("#data-table3 tbody tr").removeClass("selected");

                                                    // Add the "selected" class to the clicked row
                                                    $(this).addClass("selected");

                                                    // Get the id value of the selected row
                                                    var selectedId = $(this).find('.schedule-id').text();

                                                    // Assign the selectedId to a hidden input field for form submission
                                                    $("#selected-schedule-id").val(selectedId);
                                                });

                                            }

                                            // Initialize the datepicker
                                            $('.fc-datepicker').datepicker({
                                                format: 'yyyy-mm-dd',
                                                autoclose: true,
                                                startDate: new Date()
                                            }).on('changeDate', function(e) {
                                                // Extract the selected date
                                                var selectedDate = e.date;

                                                var currentDate = new Date();

                                                // Check if the selected date is in the past
                                                if (selectedDate < currentDate) {
                                                    // Clear the selected date
                                                    $(this).datepicker('setDate', currentDate);

                                                    // Update the dayDisplay element
                                                    $('#dayDisplay').val(getDayName(currentDate));

                                                    // Update the table based on the current date
                                                    updateTable(formatDate(currentDate));
                                                } else {
                                                    // Get the day name (e.g., Monday, Tuesday)
                                                    var dayName = getDayName(selectedDate);

                                                    // Get the formatted date in 'yyyy-mm-dd' format
                                                    var formattedDate = selectedDate.getFullYear() + '-' + (selectedDate.getMonth() + 1).toString().padStart(2, '0') + '-' + selectedDate.getDate().toString().padStart(2, '0');

                                                    // Update the dayDisplay element
                                                    $('#dayDisplay').val(dayName);

                                                    // Update the table based on the selected date
                                                    updateTable(formattedDate);
                                                }

                                            });

                                            // Function to get the day name from a Date object
                                            function getDayName(date) {
                                                var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                                                var dayIndex = date.getDay();
                                                return daysOfWeek[dayIndex];
                                            }

                                            // Function to update the table based on both selected doctor and date
                                            function updateTableByDoctorAndDate(selectedDoctor, selectedDate) {
                                                var tableBody = document.getElementById("data-table3").getElementsByTagName("tbody")[0];
                                                tableBody.innerHTML = "";

                                                <?php
                                                $noRecordsFound = true;
                                                foreach ($availableAppointments as $appointment) {
                                                    echo "var appointmentDoctor = " . $appointment['doctorId'] . ";";
                                                    echo "var appointmentDate = '" . $appointment['date'] . "';";
                                                    echo "if (appointmentDoctor == selectedDoctor && appointmentDate === selectedDate) {";
                                                    echo "tableBody.innerHTML += '<tr>' + 
                                                            '<td class=\"schedule-id\" style=\"display: none;\">' + '" . $appointment['scheduleId'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['date'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['day'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['startTime'] . "' + '</td>' + 
                                                            '<td>' + '" . $appointment['endTime'] . "' +'</td>' +
                                                            '<td>' + '" . $appointment['avail'] . "' + '</td>' + '</tr>';";

                                                    echo "}";
                                                }

                                                ?>

                                                // Event listener to handle row hover
                                                $("#data-table3 tbody tr").hover(
                                                    function() {
                                                        $(this).addClass("hovered");
                                                    },
                                                    function() {
                                                        $(this).removeClass("hovered");
                                                    }
                                                );

                                                // Event listener to handle row click
                                                $("#data-table3 tbody").on("click", "tr", function() {
                                                    // Remove the "selected" class from all rows
                                                    $("#data-table3 tbody tr").removeClass("selected");

                                                    // Add the "selected" class to the clicked row
                                                    $(this).addClass("selected");

                                                    // Get the id value of the selected row
                                                    var selectedId = $(this).find('.schedule-id').text();

                                                    // Assign the selectedId to a hidden input field for form submission
                                                    $("#selected-schedule-id").val(selectedId);
                                                });
                                            }

                                            // Event listener for doctor filter change
                                            document.getElementById("doctorfilter").addEventListener("change", function() {
                                                var selectedDoctor = this.value;
                                                var selectedDate = document.getElementById("dateFilter").value;

                                                var selectedDoctorName = this.options[this.selectedIndex].text; // Get the selected doctor's name
                                                document.getElementById("doctor_name").textContent = selectedDoctorName;

                                                updateTableByDoctorAndDate(selectedDoctor, selectedDate);
                                            });

                                            // Event listener for date filter change
                                            document.getElementById("dateFilter").addEventListener("change", function() {
                                                var selectedDate = this.value;
                                                var selectedDoctor = document.getElementById("doctorfilter").value;
                                                updateTableByDoctorAndDate(selectedDoctor, selectedDate);
                                            });
                                        </script>


                                    </form>
                                    <!-- Form end -->
                                </div>
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
<?php include 'footer.php'; ?>