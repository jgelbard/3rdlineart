<?php 
session_start();
global $now,$expire,$user_id,$fullname, $pih_staff_id;
if (isset($_SESSION['identification'])) {

	/* global  $fullname;*/
	$fname= $_SESSION['fname'];
	$lname= $_SESSION['lname'];
	$loginfullname =$fname . " " .$lname;

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
<link rel="stylesheet" href="../css/app.css"> 

</head>
<body>
	<?php
	include ('../includes/nav_main.php');
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
<!--	<script src="../js/jquery-1.7.2.min.j"></script>    
	<script src="../js/jquery-1.12.4.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/base.js"></script> -->

</body>

</html>
