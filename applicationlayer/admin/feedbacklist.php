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
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" /> -->

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

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
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
								<h1 class="page-title">Feedback from our patient</h1>
								
							</div>
							
						</div>
						<!-- PAGE-HEADER END -->

						<!-- ROW-1 OPEN -->
						<div class="container">		
							<!--<h2>Example: Star Rating System with Ajax, PHP and MySQL</h2>-->
							<?php
							//include 'inc/menu.php';
							require '../../datalayer/feedback.php';
							$rating = new Rating();
							//$try = $rating ->
							/* $productDetails = $rating->getProduct($_GET['item_id']);
							foreach($productDetails as $product){
								$average = $rating->getRatingAverage($product["id"]);
							} */
							?>		
								
							<?php
							$productRating = $rating->getProductRating();
							$ratingNumber = 0;
							$count = 0;
							$fiveStarRating = 0;
							$fourStarRating = 0;
							$threeStarRating = 0;
							$twoStarRating = 0;
							$oneStarRating = 0;	
							foreach($productRating as $rate){
								$ratingNumber+= $rate['rating'];
								$count += 1;
								if($rate['rating'] == 5) {
									$fiveStarRating +=1;
								} else if($rate['rating'] == 4) {
									$fourStarRating +=1;
								} else if($rate['rating'] == 3) {
									$threeStarRating +=1;
								} else if($rate['rating'] == 2) {
									$twoStarRating +=1;
								} else if($rate['rating'] == 1) {
									$oneStarRating +=1;
								}
							}
							$average = 0;
							if($ratingNumber && $count) {
								$average = $ratingNumber/$count;
							}	
							?>		
							<br>
							<div class = "user-wrapper bg-white" style="background-color: white; padding: 10px;">
                         	<section style="padding-bottom: 50px; padding-top: 30px; padding-left: 10px">		
							<div id="ratingDetails"> 		
								<div class="row">			
									<div class="col-sm-3">				
										<h4>Rating and Reviews</h4>
										<h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <medium>/ 5</medium></h2>				
										<?php
										$averageRating = round($average, 0);
										for ($i = 1; $i <= 5; $i++) {
											$ratingClass = "btn-default btn-grey";
											if($i <= $averageRating) {
												$ratingClass = "btn-warning";
											}
										?>
										<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>	
										<?php } ?>				
									</div>
									<div class="col-sm-3">
										<?php
										$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
										$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
										
										$fourStarRatingPercent = round(($fourStarRating/5)*100);
										$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
										
										$threeStarRatingPercent = round(($threeStarRating/5)*100);
										$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
										
										$twoStarRatingPercent = round(($twoStarRating/5)*100);
										$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
										
										$oneStarRatingPercent = round(($oneStarRating/5)*100);
										$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
										
										?>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
													<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
												</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
										</div>
										
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
												<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
													<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
												</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
												<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
													<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
												</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
													<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
												</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
													<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
												</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
										</div>
									</div>		
								
								</div>
								<div class="row">
									<div class="col-sm-7">
										<hr/>
										<div class="review-block">		
										
										<?php
										$productRating = $rating->getProductRating();
										foreach($productRating as $rating){				
											$date=date_create($rating['dateTime']);
											$reviewDate = date_format($date,"M d, Y");						
											
											
										?>				
											<div class="row">
												<div class="col-sm-3">
													
													<div class="review-block-name">By <strong><?php echo $rating['username']; ?></strong></div>
													<div class="review-block-date"><?php echo $reviewDate; ?></div>
												</div>
												<div class="col-sm-9">
													<div class="review-block-rate">
														<?php
														for ($i = 1; $i <= 5; $i++) {
															$ratingClass = "btn-default btn-grey";
															if($i <= $rating['rating']) {
																$ratingClass = "btn-warning";
															}
														?>
														<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
														<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
														</button>								
														<?php } ?>
													</div>
													<!--<div class="review-block-title"><?php echo $rating['title']; ?></div>-->
													<div class="review-block-description"><?php echo $rating['feedback']; ?></div>
												</div>
											</div>
											<hr/>					
										<?php } ?>
										</div>
									</div>
								</div>	
							</div>
						</div>	
					
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