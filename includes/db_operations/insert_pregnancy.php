<?php

if(isset($_POST['submit_Preg'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_POST['pat_id']));
 	$pregnant= mysql_real_escape_string(htmlspecialchars($_POST['pregnant']));
 	$weeks_o_preg= mysql_real_escape_string(htmlspecialchars($_POST['weeks_o_preg']));
	$breastfeeding=mysql_real_escape_string(htmlspecialchars($_POST['breastfeeding']));
    
    if ($pregnant=='Yes_preg'){
    $pregnant ='Yes';
    }
    if ($pregnant=='No_preg'){
    $pregnant ='No';
    }
 	
$insert_preg=" INSERT  INTO  pregnancy (pat_id,pregnant,weeks_o_preg,breastfeeding)
VALUES (
'$patient_id', '$pregnant', '$weeks_o_preg', '$breastfeeding')";

mysql_query($insert_preg, $bd);	
}

?>