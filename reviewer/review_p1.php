<?php
session_start();
global $now,$expire,$user_id,$fullname, $rev_id;

if (isset($_SESSION['identification'])) {
	/* global  $fullname; */
	$fname = $_SESSION['fname'];
	$lname = $_SESSION['lname'];
	$loginfullname = $fname . " " .$lname;

	/* $fname= $_SESSION['fname']; */
	$rev_id = $_SESSION['id'];
	$user_id = $_SESSION['identification'];

	/* $fullname =$_SESSION['name']; */
	$phone = $_SESSION['phone'];
	$email = $_SESSION['email'];

	$now = time(); 
	$expire = $_SESSION['expire'];
    $expired = ((integer)$now) > ((integer)$expire);
    // echo "$now > $expire".":".$expired;
    if ($expired) {
	echo '							
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Hey!</strong>Your session has expired. Please Login again to continue!!.
	</div>';
        echo "<meta http-equiv=\"Refresh\" content=\"2; url=" . "logout.php?" . "\">";
    }
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
        echo '<h4>  <span class="glyphicon glyphicon-user">Logged in: '. $loginfullname.'</span></h4>';
    }
?>  
<div class="row">
    <div class="span12">
        <div class="widget">
            <div class="widget-content">
                <div class="pricing-plans plans-3">		   			
<?php
							if (isset($_POST['submit_consolidate1'])) { 
								include ('includes/insert_consolidate1.php');   
							}

							if (isset($_POST['submit_consolidate2'])) { 
								include ('includes/insert_consolidate2.php');   
							}

							include ('includes/insert_review.php');  
							include ('includes/insert_reviewed_result.php');  

							if (isset($_GET['result'])) {
                                if (!isset($_GET['reviewed']))
                                    include ('includes/rev_results.php');
							}

							if (isset($_GET['p'])) {
                                // echo 'rev_new';
								include ('includes/rev_new.php');   
							}

							if (isset($_GET['lead_reviewer'])) {
                                echo 'lead_reviewer';
								include ('includes/sec_rev.php');   
							}

							if (isset($_GET['lead_result'])) { 
								include ('includes/sec_rev_results.php');   
							}

							if (isset($_GET['rev'])) { 
								include ('includes/rev_my_reviewed.php');   
							}

							if (isset($_GET['review'])) { 
								$formID= $_GET ['id'];
								$form_creation=mysqli_query($bd,"SELECT * FROM form_creation where 3rdlineart_form_id='$formID' ");
								while ($row_form_creation=mysqli_fetch_array($form_creation)) {

									$_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
									$clinician_id =$row_form_creation['clinician_id'];
									$pat_id =$row_form_creation['patient_id'];
									$status =$row_form_creation['status'];
									$date_created =$row_form_creation['date_created'];

									$SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
									$clinician = mysqli_query($bd,$SQL_clinician);

									$row_clinician = mysqli_fetch_array($clinician);
									$facility = $row_clinician['art_clinic'];
									$clinician_name = $row_clinician['name'];
									$clinician_phone = $row_clinician['phone'];
									$clinician_email = $row_clinician['email'];
								}

                                include ('includes/my_review.php');
								include ('includes/review_form.php');
                                if ($_GET ['reviewed'] != '1')
                                    include ('includes/review.php');  
							}

                            if (isset($_GET['result'])) { 
								$formID= $_GET ['id'];
								$form_creation=mysqli_query($bd,"SELECT * FROM form_creation, app_results where form_creation.3rdlineart_form_id='$formID' and  form_creation.3rdlineart_form_id=app_results.form_id");
                                if (mysqli_num_rows($form_creation) > 0) {
                                    while ($row_form_creation=mysqli_fetch_array($form_creation)) {
                                        // echo '>> $row_form_creation';        
                                        $_3rdlineart_form_id =$row_form_creation['3rdlineart_form_id'];
                                        $clinician_id =$row_form_creation['clinician_id'];
                                        $pat_id =$row_form_creation['patient_id'];
                                        $status =$row_form_creation['status'];
                                        $result_pdf =$row_form_creation['result_pdf'];
                                        $date_created =$row_form_creation['date_created'];
                                    
                                        $SQL_clinician = "SELECT * FROM clinician WHERE id=$clinician_id";
                                        $clinician = mysqli_query($bd, $SQL_clinician);
                                        
                                        $row_clinician = mysqli_fetch_array($clinician);
                                        $facility = $row_clinician['art_clinic'];
                                        $clinician_name = $row_clinician['name'];
                                        $clinician_phone = $row_clinician['phone'];
                                        $clinician_email = $row_clinician['email'];
                                    }

                                    echo '
								<div class="form-actions">
									<div class="span3" style="float:right">
										<a href="../documents/results/'.$result_pdf.'" target="_blank" class="btn btn-small btn-primary"> NHLS Patient Result</a>
									</div>
								</div>	
								'; 
                                    include ('includes/review_form.php');  
                                    include ('includes/review_result.php');
                                }
							}

							if (isset($_GET['consolidate'])) { 
								include ('includes/sec_consolidate1.php');   
							}

							if (isset($_GET['consolidate_result'])) {
                                echo "here2";
								include ('includes/sec_consolidate2.php');   
							}

							if (isset($_POST['submit_facility'])) { 
								include ('includes/app_patientdetails.php');   
							}

							if (isset($_POST['submit_patD'])) { 
								include ('includes/app_clinic_status.php');   
							}

							if (isset($_POST['submit_clinicstatus'])) { 
								include ('includes/app_pregnancy.php');   
							}

							if (isset($_POST['submit_Preg'])) { 
								include ('includes/app_pedriatric.php');   
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

<?php /*include ('includes/footer.php');*/ ?>   

<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/base.js"></script>
<div id="example1"></div>  -->
</body>

</html>
