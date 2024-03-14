<?php 
	include('../../datalayer/server.php');

    $doctorName = $_SESSION['username'];

    $stmt = $mysqli->prepare("SELECT * FROM doctor WHERE username = ? AND Status = 'Active'");
    $stmt->bind_param("s", $doctorName);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Fetch the data
        $row = $result->fetch_assoc();

        $doctorId = $row['doctorId'];
        $name = $row['username'];
       
    } 
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
								<h1 class="page-title">Profile</h1>
								
							</div>
							
						</div>
						<!-- PAGE-HEADER END -->

                        
						<!-- ROW-1 OPEN -->
                        <!--add a white container box as background-->
						 <div class = "user-wrapper bg-white" style="background-color: white; padding: 10px;">
                         <section style="padding-bottom: 50px; padding-top: 30px; padding-left: 10px">
                            <!-- USER PROFILE ROW STARTS-->
                         <div class="row">
                        
                        
                        <div class="col-md-9 col-sm-9  user-wrapper">
                            <div class="description">
                            <div class="row d-flex align-items-center justify-content-between" style=" padding-left: 40px; padding-right: 240px">
                                <h3 class="mb-0"><?php echo $_SESSION['username']; ?></h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Profile</button>
                            </div>

                               <hr />
                                
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        
                                        
                                        <table class="table table-user-information" align="center">
                                            <tbody>
                                                
                                                
                                                <tr>
                                                    <td>Doctor ID</td>
                                                    <td><?php echo $doctorId; ?></td>
                                                </tr> 
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?php echo $row['name']; ?>
                                                    </td>
                                                </tr>                                   
                                                <tr>
                                                    <td>Contact Number</td>
                                                    <td><?php echo $row['phone']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $row['email']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td><?php echo $row['Status']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <!-- USER PROFILE ROW END-->
                    <div class="col-md-4">
                        
                        <!-- Large modal -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Edit Profile Data </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- form start -->
                                        <form action="../../datalayer/profileUpdate.php" method="post" >
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <input type="text" style = "display: none" name="doctorId" id="update_id" value ="<?php echo $row['doctorId'] ?>">
                                                        
                                                        <td>Doctor Name:</td>
                                                        <td><input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone</td>
                                                        <td><input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>"  /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>"  /></td>
                                                    </tr> 
                                                    <tr>
                                                        <td>
                                                            <input type="submit" name="updatedataDoctor" class="btn btn-info" value="Update Info"></td>
                                                        </tr>
                                                    </tbody>
                                                    
                                                </table>
                                                
                                                
                                                
                                            </form>
                                            <!-- form end -->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br /><br/>
                        </div>
                        
                    </div>
                         </div>
							
						
						<!-- ROW-1 CLOSED -->
                        
						
				
				<!-- CONTAINER CLOSED -->   
                         	<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
		
			</div>
		</div>

		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>-->
			
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
<?php include 'admin/footer.php'; ?>