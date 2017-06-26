<?php

if(isset($_POST['submit_pediatric'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_POST['pat_id']));
 	$mother_had_single_dose_NVP= mysql_real_escape_string(htmlspecialchars($_POST['mother_had_single_dose_NVP']));
 	$given_NVP= mysql_real_escape_string(htmlspecialchars($_POST['given_NVP']));
	$mother_had_PMTCT=mysql_real_escape_string(htmlspecialchars($_POST['mother_had_PMTCT']));
	$swallow_tablets=mysql_real_escape_string(htmlspecialchars($_POST['swallow_tablets']));
 	
$insert_pediatric=" INSERT  INTO  pediatric (pat_id,mother_had_single_dose_NVP,given_NVP,mother_had_PMTCT,swallow_tablets)
VALUES (
'$patient_id', '$mother_had_single_dose_NVP', '$given_NVP', '$mother_had_PMTCT', '$swallow_tablets')";

mysql_query($insert_pediatric, $bd);	
}

?>