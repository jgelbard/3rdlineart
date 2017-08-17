<?php 
session_start();
global $now,$expire,$user_id,$fullname;
if (isset($_SESSION['identification'])){

	/* global  $fullname;*/
	$fname= $_SESSION['fname'];
	$lname= $_SESSION['lname'];
	$fullname =$fname . " " .$lname;

	/*$fname= $_SESSION['fname'];*/
	$rev_id= $_SESSION['id'];
	$user_id=$_SESSION['identification'];

	$now = time(); 
	$expire= $_SESSION['expire'];}

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
</style>
</head>
<body>

	<?php
	include ('../includes/nav_main.php');
	include ('includes/nav_sub.php');
	?>
    
	<div class="main">

		<div class="main-inner">

			<div class="container">

				<div class="row">

					<div class="span12">

						<div class="widget">

							<div class="widget-content">
								
								<div> <!-- class="pricing-plans plans-3"> -->
									<?php
                                    include ('../includes/email_templates.php');
									include ('includes/delete_user.php');                             
									include ('includes/delete_facility_drug_affliates.php');
									include ('includes/insert_reviewer.php'); 
									include ('includes/insert_clinician.php'); 
									include ('includes/insert_lab_user.php'); 
									include ('includes/insert_sec.php');
									include ('includes/insert_drug.php'); 
									include ('includes/insert_facility.php'); 
									include ('includes/insert_affliates.php'); 
									include ('includes/update_facility_drug_affliates.php');  
									include ('includes/update_user.php');  

									if(isset($_GET['p'])){ 
										echo '<div class="span11" style="padding:200px 50px">
										<h1 style="font-size:1000%; color:#efeded">Admin Page</h1>
									</div>
									';
								}

								echo '<div class="span11">';
  
								if(isset($_GET['man_facility'])){
									include ('includes/admin_facilities.php');   
								}

								if(isset($_GET['create_facility'])){ 
									include ('includes/create_facility.php');   
								}

								if(isset($_GET['facility_edit'])){ 
									include ('includes/facility_edit.php');   
								}

								if(isset($_GET['man_drugs'])){ 
									include ('includes/man_drugs.php');   
								}

								if(isset($_GET['create_drug'])){ 
									include ('includes/create_drug.php');   
								}

								if(isset($_GET['drug_edit'])){ 
									include ('includes/drug_edit.php');   
								}

								if(isset($_GET['man_affliates'])){ 
									include ('includes/man_affliates.php');   
								}

								if(isset($_GET['create_affliate'])){ 
									include ('includes/create_affliate.php');   
								}

								if(isset($_GET['affliate_edit'])){ 
									include ('includes/affliate_edit.php');   
								}

								if(isset($_GET['man_clin'])){ 
									include ('includes/clinician.php');   
								}

								if(isset($_GET['man_sec'])){ 
									include ('includes/sec.php');   
								}

								if(isset($_GET['man_lab'])){ 
									include ('includes/lab_staff.php');   
								}

								if(isset($_GET['man_rev'])){ 
									include ('includes/reviewer.php');   
								}

								if(isset($_GET['create_clin'])){ 
									include ('includes/create_clin.php');   
								}

								if(isset($_GET['clin_edit'])){ 
									include ('includes/clinician_edit.php');   
								}

								if(isset($_GET['create_sec'])){ 
									include ('includes/create_sec.php');   
								}

								if(isset($_GET['sec_edit'])){ 
									include ('includes/sec_edit.php');   
								}

								if(isset($_GET['create_lab_user'])){ 
									include ('includes/create_lab.php');   
								}

								if(isset($_GET['lab_edit'])){ 
									include ('includes/labuser_edit.php');   
								}

								if(isset($_GET['reviewer'])){ 
									include ('includes/reviewer_new.php');   
								}

								if(isset($_GET['rev_edit'])){ 
									include ('includes/reviewer_edit.php');   
								}

								?>

							</div>
						</div> <!-- /pricing-plans -->

					</div> <!-- /widget-content -->

				</div> <!-- /widget -->					

			</div> <!-- /span12 -->     	

		</div> <!-- /row -->

	</div> <!-- /container -->

</div>

</div> <!-- /main -->

<?php /*include ('includes/footer.php');*/ ?>   

<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/base.js"></script>

</body>

</html>
