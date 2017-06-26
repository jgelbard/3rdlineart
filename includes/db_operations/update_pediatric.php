<?php

if(isset($_POST['update_pediatric'])){ 
	
    
    
    $patient_id= mysql_real_escape_string(htmlspecialchars($_POST['pat_id']));
    
    
    $sql_delete_pediatric = "DELETE FROM  pediatric where pat_id =$patient_id";
    mysql_query($sql_delete_pediatric, $bd);
    
   
    if (mysql_query($sql_delete_pediatric, $bd)){
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Pediatric section updated</strong> 
                           
                           </div>
   ';
    }
    
 	$mother_had_single_dose_NVP= mysql_real_escape_string(htmlspecialchars($_POST['mother_had_single_dose_NVP']));
 	$given_NVP= mysql_real_escape_string(htmlspecialchars($_POST['given_NVP']));
	$mother_had_PMTCT=mysql_real_escape_string(htmlspecialchars($_POST['mother_had_PMTCT']));
	$swallow_tablets=mysql_real_escape_string(htmlspecialchars($_POST['swallow_tablets']));
    
    
 	
$insert_pediatric=" INSERT  INTO  pediatric (pat_id,mother_had_single_dose_NVP,given_NVP,mother_had_PMTCT,swallow_tablets)
VALUES (
'$patient_id', '$mother_had_single_dose_NVP', '$given_NVP', '$mother_had_PMTCT', '$swallow_tablets')";

mysql_query($insert_pediatric, $bd);	
    
include ('includes/app_treatment1_edit.php');   
}

?>