<?php
include ('includes/head.php');

session_start();
global $now,$expire,$user_id;

if (isset($_SESSION['identification'])){
    global  $fullname;
    $fname= $_SESSION['username'];
    $user_id=$_SESSION['identification'];
    
    $loginfullname =$_SESSION['name'];
    $phone= $_SESSION['phone'];
    $email= $_SESSION['email'];
    $facility = $_SESSION['art_clinic'];
    
    $now = time(); 
    $expire= $_SESSION['expire'];
}

$SQL_secretary = "SELECT * FROM secretary limit 1";
$secretary = mysqli_query($bd, $SQL_secretary);
$row_secretary = mysqli_fetch_array($secretary);
$email_secretary = $row_secretary['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Application Form</title>

	<style>
		input[type="text"] {
			height: 25px; 
		}
		fieldset {
			margin: 20px;
			padding: 30px;
			margin-top: 20px;
			border: 1px solid #000;
		}
	</style>
</head>
<body>

	<div class="main">

		<div class="main-inner">

			<div class="container">

				<div class="row">

					<div class="span12">

						<div class="widget">

							<div class="widget-content">

								<div class="pricing-plans plans-3" style="padding:0 70px">

									<?php
									global $pat_id;
									$pat_id= $_GET['pat_id'];
									if(isset($_POST['submit_adher'])){ 
										include ('includes/db_operations/insert_adherence_lab.php');   
									}

									if(isset($_POST['update_adher'])){
										include ('includes/db_operations/update_adherence_lab.php'); 
									}

									if(isset($_POST['cancel_app'])){ 
										$sql_cancel_app = "DELETE FROM form_creation where patient_id =$pat_id";
										$sql_cancel_patient = "DELETE FROM patient where id =$pat_id";

										mysqli_query($bd, $sql_cancel_patient);

										if (mysqli_query($bd, $sql_cancel_app)){
											echo '<div class="alert alert-warning">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<p style="color:#f00"><strong>Yoo!</strong> You Cancelled the application. </p>

										</div>
										';
									}

								}

								if(isset($_POST['save_app'])){ 
									echo '							
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Yoo!</strong> You Cancelled the application.

									</div>
									';   
								}

								if(!isset($_POST['complete_submit']) && !isset($_POST['cancel_app'])){ 
									include ('form_complete.php');     
									echo '              
											<form id="edit-profile" class="form-horizontal" action="complete_form.php?pat_id='.$pat_id.'" method="post">     
									<div class="form-actions">
										<div class="span3">
											<a class="btn" href="app.php?back_adherence&pat_id='.$pat_id.'&g='.$gender.'&xx='.$age.'" style="padding:10px; margin:2px; font-size:180%">Back</a>   
                                    </div>
                                  
                                    <div class="span3">';
                                    
                                    include ('includes/app_edit_menu.php'); 
                                 
                                    echo '
										</div>

										<div class="span3">
												<button type="submit" class="btn btn-danger" style="padding:10px; font-size:120%; float:right" name="cancel_app">Cancel Application</button> 
										</div>
									</div>				
											</form>	
									<div class="form-actions">
										<form id="edit-profile" class="form-horizontal" action="complete_form.php?pat_id='.$pat_id.'" method="post">                
											<div class="span10" align="center">
												<button type="submit" class="btn btn-success" style="padding:10px; font-size:150%" name="complete_submit">Submit Application</button> 
											</div>
										</form>
									</div>				
									';
								}

								if(isset($_POST['complete_submit'])) {
                                    $sql_get_formid = "SELECT form_id from form_rejected where form_id in (SElECT form_id from form_creation WHERE patient_id='$pat_id')";
                                    $form_exists = mysqli_num_rows(mysqli_query($bd, $sql_get_formid ));

                                    $form_submited = mysqli_query($bd, $sql_get_formid ); 
									$sql_form_creation = "UPDATE form_creation ".
									"SET status='Complete'".
                                        ($form_exists?", complete='No' ":" ").
									"WHERE patient_id='$pat_id'";

									$form_submited = mysqli_query($bd, $sql_form_creation );    

									echo '							
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success!</strong> You have submitted the application.
									</div>
									<div class="form-actions">
										<form id="edit-profile" class="form-horizontal" action="logout.php" method="post">
											<div class="span3">
												<button class="btn " style="padding:10px; font-size:180%">Logout</button>               
											</div>
										</form>
										<div class="span3"></div>
										<form id="edit-profile" class="form-horizontal" action="app.php?p" method="post">
											<div class="span3">
												<button type="submit" class="btn btn-success" style="padding:10px; font-size:180%" name="complete_submit">New Application</button> 
											</div>
										</form>	 
									</div>				
									';
                                    email_msg('complete_form', $email_secretary);
								}
								?>	
							</div> 

						</div> 

					</div>

				</div>	

			</div> 

		</div> 

	</div>

</div>

<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
                                    -->

</body>

</html>
