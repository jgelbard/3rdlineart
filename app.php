<?php 
session_start();
global $now, $expire, $user_id, $clinicianID;
if (isset($_SESSION['identification'])){

	global  $fullname;
	$fname= $_SESSION['username'];
	/* $lname= $_SESSION['lname'];*/
	$user_id=$_SESSION['identification'];
	$clinicianID = $_SESSION['id'];
	$loginfullname = $_SESSION['name'];
	$clin_phone = $_SESSION['phone'];
	$clin_email = $_SESSION['email'];
	$facility = $_SESSION['art_clinic'];

	$now = time(); 
	$expire= $_SESSION['expire'];}
    $expired = ((integer)$now) > ((integer)$expire);
// echo "$now > $expire".":".$expired;
    if ($expired) {
        echo '							
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Hey!!</strong>Your session has expired. Please Login again to continue!!.
	</div>';
        echo "<meta http-equiv=\"Refresh\" content=\"2; url=" . "logout.php?" . "\">";
    }
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Application Form</title>
		<script language=JavaScript>

//Disable right click script
var message = "";
///////////////////////////////////
function clickIE() {
	if (document.all) {
		(message);
		return false;
	}
}

function clickNS(e) {
	if (document.layers || (document.getElementById && !document.all)) {
		if (e.which == 2 || e.which == 3) {
			(message);
			return false;
		}
	}
}
if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown = clickNS;
} else {
	document.onmouseup = clickNS;
	document.oncontextmenu = clickIE;
}

document.oncontextmenu = new Function("return false")
</script>  
<?php include ('includes/head.php');
?>

<?php
echo "<link rel=\"stylesheet\" href=\"$rooturl/css/app.css\" type=\"text/css\" >";
?>

<!-- <link href="css/app.css" rel="stylesheet"  type="text/css" > -->

</head>
<body>

<?php
include ('includes/nav_main.php');
include ('includes/nav_sub.php');

// foreach($_POST as $key => $value) { echo "<br>$key: $value"; }
?>
	<div class="main">

		<div class="main-inner">

			<div class="container">
				<?Php
				if (isset($_SESSION['identification'])){
					echo '<h4>  <span class="glyphicon glyphicon-user">Clinician: '. $loginfullname.'</span></h4>';

				}
				?>  
				<div class="row">

					<div class="span12">

						<div class="widget">

							<div class="widget-content">

                                <div class="pricing-plans plans-3">

                                <?php
									global $tot_number;
									$form_creation=mysqli_query($bd, "SELECT * FROM form_creation, expert_review_consolidate1 WHERE form_creation.3rdlineart_form_id not in (select form_id from sample) and form_creation.3rdlineart_form_id=expert_review_consolidate1.form_id and form_creation.clinician_id ='$clinicianID'"); 
									$tot_number = mysqli_num_rows ($form_creation);
									global $tot_number_conso2;
									$form_creation_conso2=mysqli_query($bd, "SELECT * FROM form_creation, expert_review_consolidate2 WHERE form_creation.3rdlineart_form_id=expert_review_consolidate2.form_id and form_creation.clinician_id ='$clinicianID'"); 
									$tot_number_conso2 = mysqli_num_rows ($form_creation_conso2);
									?>

								</div>
								<?php
								if(isset($_POST['search'])) { 

									$pat_id = $_POST['id'];
									if ($pat_id !='--select ARV Number--') {
        
                                        if(isset($_POST['comment'])){ 
                                            $pat_id =$pat_id.'&comment&form_id='.$_POST['form_id'];
                                        }                                       
										echo"<meta http-equiv=\"Refresh\" content=\"0; url=app.php?back&part_1&pat_id=".$pat_id."\">";
									}
									else {
										include ('includes/app_patientdetails.php');   
									}
								}


								global $pat_id, $gender, $age, $dob;
                                $patient = new Patient($pat_id);

								if(isset($_GET['g'])){ 
									$gender = $_GET['g'];
								}

                                if(isset($_POST['dob'])) {
									$dob = $_POST['dob'];
									$age = GetAge($dob);
								}

                                if(isset($_GET['p'])){ 
									include ('includes/app_facility.php');  
								}

                                // dash stats
								if(isset($_GET['dash'])){ 
									include ('includes/app_dashboard.php');  
								}

                                if(isset($_GET['rejec'])){ 
                                    include ('includes/app_rejected_forms.php');  
                                }

								if(isset($_GET['rev'])){ 
									include ('includes/app_consolidated1.php');   
								}

								if(isset($_GET['conso2'])){ 
									include ('includes/app_consolidated2.php');   
								}

								if(isset($_GET['conso2view'])){ 
									include ('includes/app_consolidated2_view.php');   
								}

								if(isset($_GET['view'])){ 
									include ('includes/app_consolidated1_view.php');   
								}

								if(isset($_POST['submit_p'])){ 
									include ('includes/app_facility.php');   
								}

								if(isset($_POST['submit_facility']) || isset($_GET['return_part_1'])){ 
									include ('includes/app_patientdetails.php');   
								}

								if(isset($_GET['part_1'])){ 
									include ('includes/app_patientdetails_edit.php');   
								}

								if(isset($_GET['app_clin'])){ 
									include ('includes/app_clinic_status_edit.php');  // was app_clinic_status 
								}

								if(isset($_POST['submit_patD'])){ 
									include ('includes/db_operations/insert_patient.php');   
								}

								$age=$_GET['xx'];
                                $age_or_preg = 0;

								if(isset($_POST['submit_clinicstatus']) || isset($_POST['update_clinicstatus']) || isset($_GET['back_3'])) {
                                    //insert updated clinic status records
                                    // include ('includes/db_operations/update_clinic_status.php');
                                    
									if (isset($_POST['update_clinicstatus'])) { 
										include ('includes/db_operations/update_clinic_status.php');  
									}

									if (isset($_POST['submit_clinicstatus'])) { 
										include ('includes/db_operations/insert_clinic_status.php'); 
									}
                                    
									if  ($gender=='Female' && $age >'10') { // possibly pregnant
                                        $age_or_preg = 1;
										if (isset($_POST['update_clinicstatus']) || isset($_GET['back_3'])) { 
											include ('includes/app_pregnancy_edit.php'); 
										}

										if (isset($_POST['submit_clinicstatus'])) {    
											include ('includes/app_pregnancy.php'); 
										}
									} 

									else if ($age <='3') { // pediatric
										/*echo 'age'. $gender;*/
                                        $age_or_preg = 1;
										if (isset($_POST['update_clinicstatus']) || isset($_GET['back_3']) || isset($_GET['back'])) { 
											include ('includes/app_pedriatric_edit.php');  
										}

										if (isset($_POST['submit_clinicstatus'])) { 
											include ('includes/app_pedriatric.php');       
										}
									} 

									else if (!isset($_GET['part_2'])) {
										include ('includes/app_treatment1_edit.php');
									}
								}

								if(isset($_POST['submit_treatment1'])){ 
									include ('includes/app_treatment2.php');
								}

								if(isset($_POST['submit_treatment2'])){ 
									include ('includes/app_treatment3_edit.php');  // was app_treatment3.php
								}

								if(isset($_POST['submit_Preg'])){ 
									include ('includes/db_operations/insert_pregnancy.php'); 
									include ('includes/app_treatment1.php');
								}

								if(isset($_POST['submit_pediatric'])){ 
									include ('includes/db_operations/insert_pediatric.php');
								}

								if(isset($_POST['submit_pediatric'])){ 
									include ('includes/app_treatment1.php');
								}

								if(isset($_POST['submit_treatment1'])){ 
									include ('includes/db_operations/insert_treatment1.php');   
								}

								if(isset($_POST['submit_treatment2'])){ 
									include ('includes/db_operations/insert_treatment2.php');   
								}

								if(isset($_POST['submit_treatment3'])){ 
									include ('includes/db_operations/insert_treatment3.php');   
								}

								if(isset($_POST['submit_treatment3'])){ 
									include ('includes/app_adherence.php');   
								}

								if(isset($_GET['sendsample'])){ 
									include ('includes/db_operations/insert_sample.php'); 
									echo"<meta http-equiv=\"Refresh\" content=\"1; url=app.php?p\">";
								}
                                // update form processes
								if(isset($_POST['update_patD'])) {
									include ('includes/db_operations/update_patient.php');   
								}

                                if(isset($_GET['part_2']) and (isset($_GET['back_3']) or isset($_GET['back'])) and !$age_or_preg) { 
									include ('includes/app_clinic_status_edit.php');
								}

								if(isset($_POST['update_pediatric'])){ 
									include ('includes/db_operations/update_pediatric.php');   
								}

								if(isset($_POST['update_Preg'])){
                                    // echo "update preg?";
									include ('includes/db_operations/update_pregnancy.php');   
								}

								if(isset($_POST['update_treatment1'])){ 
									include ('includes/db_operations/update_treatment1.php'); 
									include ('includes/app_treatment2_edit.php');
								}

								if(isset($_GET['back_treatment1'])){
									include ('includes/app_treatment1_edit.php');
								}

								if(isset($_GET['back_treatment2'])){ 
									include ('includes/app_treatment2_edit.php');
								}

								if(isset($_GET['back_treatment3'])){ 
									include ('includes/app_treatment3_edit.php');
								}

								if(isset($_POST['update_treatment2'])){ 
									include ('includes/db_operations/update_treatment2.php'); 
									include ('includes/app_treatment3_edit.php');
								} 

								if(isset($_POST['update_treatment3'])){ 
									include ('includes/db_operations/update_treatment3.php'); 
									include ('includes/app_adherence_edit.php'); 
								}

								if(isset($_GET['back_adherence'])){ 
									include ('includes/app_adherence_edit.php'); 
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

<?php include ('includes/footer.php'); ?>   

<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<!-- <script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/base.js"></script> -->
	<SCRIPT language="javascript">

		$(function()
		{
			$(document).on('click', '.btn-add', function(e)
			{
				e.preventDefault();
				var controlForm = $('.controls div:first'),
				currentEntry = $(this).parents('.entry:first'),
				newEntry = $(currentEntry.clone()).appendTo(controlForm);

				newEntry.find('input').val('');
				controlForm.find('.entry:not(:last) .btn-add')
				.removeClass('btn-add').addClass('btn-remove')
				.removeClass('btn-success').addClass('btn-danger')
				.html('<span class="glyphicon glyphicon-minus"></span>');
			}).on('click', '.btn-remove', function(e)
			{
				$(this).parents('.entry:first').remove();

				e.preventDefault();
				return false;
			});
		});

	</script>
	<!-- <script src="js/jquery-1.12.4.js"></script> --> <!--//jquery for clinic status datepicker-->
	<!-- <script src="validation/lib/jquery.js"></script> -->
	<!-- <script src="js/jquery.min.js"></script> --> <!--/jquerry for patientdetails datepicker-->
	<!-- <script src="dist/jquery.date-dropdowns.js"> </script> -->
	<!-- <script src="js/jquery-ui.js"></script> --> <!--//jquery for clinic status datepicker-->
	<script>
		$( function() {
			$( "#datepicker" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				changeYear: true
			});
		} );
	</script>
	<script>
		$( function() {
			$( "#datepicker1" ).datepicker({
				changeMonth: true,
				maxDate: '0', 
				changeYear: true
			});
		} );
	</script>
	<!-- <script src="validation/dist/jquery.validate.js"></script> -->
</body>

</html>
