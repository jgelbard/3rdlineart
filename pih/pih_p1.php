<?php 
session_start();
global $now,$expire,$user_id,$fullname, $pih_staff_id;
if (isset($_SESSION['identification'])) {

	/* global  $fullname;*/
	$fname= $_SESSION['fname'];
	$lname= $_SESSION['lname'];
	$fullname =$fname . " " .$lname;

	$user_id=$_SESSION['identification'];
	$pih_staff_id = $_SESSION['id'];

	/*$fullname =$_SESSION['name'];*/
	$phone= $_SESSION['phone'];
	$email= $_SESSION['email'];
	$now = time(); 
	$expire= $_SESSION['expire'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Application Form</title>

	<?php 

	include ('../includes/head.php');

	?>

	<style>
		input[type="text"] {
			height: 35px; 
		}

		.box{
			padding: 20px;
			display: none;
			margin-top: 20px;
			/* border: 1px solid #000;*/
		} 
		.sec{
			padding: 20px;
			display: none;
			margin-top: 20px;
			/* border: 1px solid #000;*/
		}
		fieldset {
			margin: 20px;
			padding: 30px;
			margin-top: 20px;
			border: 1px solid #000;
		}

		.entry:not(:first-of-type)
		{
			margin-top: 10px;
		}

		.glyphicon
		{
			font-size: 12px;
		}

		#example10 select {
			width:80px; margin:3px;
		} 
		#app_radio {
			width:20px; height:20px;

		}
		.radio {
			font-size:115%;
		}

		.radio_sty {
			color: #AAAAAA;
			display: inline;
			position: relative;
			float: left;
			width: 100%;
			height: 100px;

		}

		.radio_sty input[type=radio]{
			position: absolute;
			visibility: hidden;
		}

		.radio_sty label{
			display: block;
			position: relative;
			font-weight: 300;
			font-size: 1.35em;
			padding: 25px 25px 25px 80px;
			margin: 10px auto;
			height: 30px;
			z-index: 9;
			cursor: pointer;
			-webkit-transition: all 0.25s linear;
		}

		.radio_sty:hover label{
			color: #FFFFFF;
		}

		.radio_sty .check{
			display: block;
			position: absolute;
			border: 5px solid #AAAAAA;
			border-radius: 100%;
			height: 20px;
			width: 20px;
			top: 30px;
			left: 20px;
			z-index: 5;
			transition: border .25s linear;
			-webkit-transition: border .25s linear;
		}

		.radio_sty:hover .check {
			border: 5px solid #FFFFFF;
		}

		.radio_sty .check::before {
			display: block;
			position: absolute;
			content: '';
			border-radius: 100%;
			height: 15px;
			width: 15px;
			top: 2.5px;
			left: 3px;
			margin: auto;
			transition: background 0.25s linear;
			-webkit-transition: background 0.25s linear;
		}

		input[type=radio]:checked ~ .check {
			border: 5px solid #0cde80;
		}

		input[type=radio]:checked ~ .check::before{
			background: #0DFF92;
		}

		input[type=radio]:checked ~ label{
			color: #0cde80;
		}

		/* latin-ext */
		@font-face {
			font-family: 'Lato';
			font-style: normal;
			font-weight: 400;

		}

		/* latin */
		@font-face {
			font-family: 'Lato';
			font-style: normal;
			font-weight: 400;
		}

		.control-label {
			position:relative; top:30px;
			font-family: 'Lato', sans-serif;
			font-size:110%;

		}
	</style>
</head>
<body>
	<?php
	include ('includes/nav_main.php');
	include ('includes/nav_sub.php');

	?>

	<div class="main">

		<div class="main-inner">

			<div class="container">
				<?php
				if (isset($_SESSION['identification'])){
					echo '<h4>  <span class="glyphicon glyphicon-user">Logged in: '. $fullname.'</span></h4>';
				}
				?>  
				<div class="row">

					<div class="span12">

						<div class="widget">

							<div class="widget-content">

								<div class="pricing-plans plans-3">

									<?php

									if(isset($_POST['submit_vl_done'])){ 
										include ('includes/insert_lab_vl_repeat.php');    
									}

									if(isset($_GET['p'])){ 
										include ('includes/lab_new.php');   
									}

									if(isset($_GET['sample'])){ 
										include ('includes/lab_sample.php');
									}

									?>		

								</div> <!-- /pricing-plans -->

							</div> <!-- /widget-content -->

						</div> <!-- /widget -->					

					</div> <!-- /span12 -->     	

				</div> <!-- /row -->

			</div> <!-- /container -->

		</div>

	</div> <!-- /main -->

<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.7.2.min.j"></script>    
	<script src="../js/jquery-1.12.4.js"></script><!--//jquery for clinic status datepicker-->
	<script src="../js/jquery-ui.js"></script><!--//jquery for clinic status datepicker-->
	<script src="../js/bootstrap.js"></script>
	<script src="../js/base.js"></script>

</body>

</html>
