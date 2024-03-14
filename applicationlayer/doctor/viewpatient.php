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
							<div class="ml-auto pageheader-btn">
								
								<a href="patientadd.php" class="btn btn-secondary btn-icon text-white">
									<span>
										<i class="fe fe-plus"></i>
									</span> Add Patient
								</a>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
										<div class="card-header">
												<br>
												<h3 class="card-title">Patient Details</h3>
												<br>
										</div>
										<div class="card-body"> 
                                            <form method="post" action="">
                                                <div style="text-align: right;">
                                                    <a href="patient.php" class="btn btn-primary">Back</a>
                                                </div>
                                            </form>
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

                                                            if (isset($_GET['patientId'])) {
                                                                $selectedPatientId = $_GET['patientId'];

                                                                // If no form submission, display today's appointments
                                                                $currentDate = date("Y-m-d");
                                                                $results = mysqli_query($mysqli, "SELECT a.patientId, a.name AS patientName, b.appointmentId, c.date, c.day, c.startTime, c.endTime, d.name, b.status, b.description 
                                                                    FROM patient a 
                                                                    JOIN appointment b ON a.patientId = b.patientId 
                                                                    JOIN schedule c ON b.scheduleId = c.scheduleId 
                                                                    JOIN treatment d ON d.treatmentId = b.treatmentId
                                                                    WHERE a.patientId = $selectedPatientId
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
                                                                        <button class="btn btn-default btn-sm mb-2 mb-xl-0 viewbtn" 
                                                                                data-toggle="tooltip" data-original-title="View"onclick="viewAppointmentDescription('<?php echo $row['description']; ?>')">
                                                                            <i class="fa fa-eye" id="viewbtn"></i>
                                                                        </button>
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
							
                           
                            <script>
                                function viewAppointmentDescription(description) {
                                        console.log("Original Description:", description);

                                        // Check if description is not provided or is not a string
                                        if (!description || typeof description !== 'string') {
                                            console.error("Invalid or missing description.");
                                            return;
                                        }

                                        // Trim description to remove leading and trailing whitespaces
                                        var trimmedDescription = description.trim();

                                        console.log("Trimmed Description:", trimmedDescription);

                                        // Check if the trimmed description is empty or contains only whitespace
                                        if (!trimmedDescription) {
                                            // If description is empty, show an empty modal
                                            document.getElementById("viewDescription").value = "";
                                            $("#viewmodal").modal("show");
                                        } else {
                                            // If description is not empty, display it in the modal
                                            document.getElementById("viewDescription").value = trimmedDescription;
                                            $("#viewmodal").modal("show");
                                        }
                                    }
                                document.getElementById("closeButton").addEventListener("click", function () {
                                    document.getElementById("dayDisplay").value = "";
                                    // Close the modal when the close button is clicked
                                    $("#viewmodal").modal("hide");
                                });
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
                                                <textarea class="form-control" id="viewDescription" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Closed Pop up to View Description -->
    
		
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