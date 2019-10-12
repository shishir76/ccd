<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
	<head>
		<title>Lingua</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Lingua project">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets1/styles/bootstrap4/bootstrap.min.css">
		<link href="<?php echo base_url();?>assets1/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets1/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets1/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets1/plugins/OwlCarousel2-2.2.1/animate.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets1/styles/main_styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets1/styles/responsive.css">
	</head>	
	
    <body>



<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		<?php include "header.php";?>

		<!-- Header Content -->
		<?php include "topmenu.php";?>

	</header>

	<!-- Menu -->

		<?php include "topmenu1.php";?>
	
	<!-- Home -->

	<div class="home">
		<?php include "slider.php";?>
	</div>

	<!-- Language -->

	<div class="language">
		<?php include "languages.php";?>
	</div>

	<!-- Courses -->

	<div class="courses">
		<?php include "courses.php";?>
	</div>

	<!-- Instructors -->

	<div class="instructors">
		<?php include "instructors.php";?>
	</div>

	<!-- Register -->

	<div class="register">
		<?php include "register.php";?>
	</div>

	<!-- Events -->

	<div class="events">
		<?php include "events.php";?>
	</div>

	<!-- Blog -->

	<div class="blog">
		<?php include "blog.php";?>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<?php include "footer.php";?>
	</footer>
</div>






		<script src="<?php echo base_url();?>assets1/js/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url();?>assets1/styles/bootstrap4/popper.js"></script>
		<script src="<?php echo base_url();?>assets1/styles/bootstrap4/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets1/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
		<script src="<?php echo base_url();?>assets1/plugins/easing/easing.js"></script>
		<script src="<?php echo base_url();?>assets1/js/custom.js"></script>
    </body>
</html>