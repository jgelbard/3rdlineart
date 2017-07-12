<?php

if(isset($_POST['submit_pediatric'])){ 
	
<<<<<<< HEAD
    $patient_id= mysqli_real_escape_string($bd, $_POST['pat_id']);
 	$mother_had_single_dose_NVP= mysqli_real_escape_string($bd, $_POST['mother_had_single_dose_NVP']);
 	$given_NVP= mysqli_real_escape_string($bd, $_POST['given_NVP']);
	$mother_had_PMTCT=mysqli_real_escape_string($bd, $_POST['mother_had_PMTCT']);
	$swallow_tablets=mysqli_real_escape_string($bd, $_POST['swallow_tablets']);
=======
    $patient_id= mysqli_real_escape_string($bd, htmlspecialchars($_POST['pat_id']));
 	$mother_had_single_dose_NVP= mysqli_real_escape_string($bd, htmlspecialchars($_POST['mother_had_single_dose_NVP']));
 	$given_NVP= mysqli_real_escape_string($bd, htmlspecialchars($_POST['given_NVP']));
	$mother_had_PMTCT=mysqli_real_escape_string($bd, htmlspecialchars($_POST['mother_had_PMTCT']));
	$swallow_tablets=mysqli_real_escape_string($bd, htmlspecialchars($_POST['swallow_tablets']));
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
 	
$insert_pediatric=" INSERT  INTO  pediatric (pat_id,mother_had_single_dose_NVP,given_NVP,mother_had_PMTCT,swallow_tablets)
VALUES (
'$patient_id', '$mother_had_single_dose_NVP', '$given_NVP', '$mother_had_PMTCT', '$swallow_tablets')";

mysqli_query( $bd,$insert_pediatric);	
}

?>