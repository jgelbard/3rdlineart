<?php

session_start();
global $now,$expire,$user_id,$fullname;
if (isset($_SESSION['identification'])) {

	/* global  $fullname;*/
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$loginfullname = $fname . " " .$lname;

	/*$fname= $_SESSION['fname'];*/
	$sec_id = $_SESSION['id'];
	$user_id = $_SESSION['identification'];

	/*$fullname =$_SESSION['name'];*/
	$phone = $_SESSION['phone'];
	$email = $_SESSION['email'];
    
	$now = time(); 
	$expire = $_SESSION['expire'];
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
<!--    <link rel="stylesheet" href="../css/cp.css"> -->
</head>
<body>

<?php
    global $rev_title, $rev_lname, $comment_to_clinician;
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

								<div class="pricing-plans plans-3">

									<?php
									if(isset($_POST['submit_reviewers'])){
                                        include ('includes/insert_reviewers.php');
									}

									if(isset($_POST['submit_consolidate1'])){ 
										include ('includes/insert_consolidate1.php');   
									}

									if(isset($_POST['submit_consolidate2'])){ 
										include ('includes/insert_consolidate2.php');   
									}


									if(isset($_GET['complete'])){ 

										$form_ID= $_GET['form_id'];

										$sql_form_creation_complete = "UPDATE form_creation ".
										"SET complete='Yes'".
										"WHERE 3rdlineart_form_id='$form_ID'" ;

										$form_submited_complete = mysqli_query( $bd , $sql_form_creation_complete);   

									}
                                   
                                    if(isset($_GET['notcomplete'])){ 
                                        include ('includes/sec_app_reject.php');   
                                    }

									if(isset($_GET['p'])){ 
										include ('includes/sec_new.php');
									}

									if(isset($_GET['view'])) {
                                        if (isset($_GET['subnav']))
                                            include ('includes/sub_nav.php');
										include ('includes/app_form.php');   
									}

									if(isset($_GET['received'])){ 
										include ('includes/sec_attach_resultpdf.php');  
									}

									if(isset($_GET['pending'])){ 
										include ('includes/sec_results_under_rev.php');   
									}

 									if(isset($_GET['pending_result'])){
										include ('includes/sec_pending_result.php');   
									}

									if(isset($_GET['pending_sample'])){ 
										include ('includes/sec_pending_sample.php');   
									}

									if(isset($_GET['reviewed_app'])){ 
										include ('includes/sec_reviewed_app.php');   
									}

									if(isset($_GET['reviewed_result'])){ 
										include ('includes/sec_reviewed_result.php');   
									}

									if(isset($_GET['reminder'])){ 
										include ('includes/sec_reminder.php');   
									}

									if(isset($_GET['rev'])){ 
										include ('includes/sec_rev.php');   
									}

									if(isset($_GET['assign'])){ 
										include ('includes/sec_assign_reviewer.php');   
									}

									if(isset($_GET['consolidate'])){ 
										include ('includes/sec_consolidate1.php');   
									}

									if(isset($_GET['consolidate_result'])){ 
										include ('includes/sec_consolidate2.php');   
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
        
<?php include ('../includes/footer.php'); ?>   
<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/base.js"></script> -->

</body>

</html>
