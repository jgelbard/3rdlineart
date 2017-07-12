<?php

if(isset($_POST['submit_Preg'])){ 
	
<<<<<<< HEAD
    $patient_id= mysqli_real_escape_string($bd, $_POST['pat_id']);
 	$pregnant= mysqli_real_escape_string($bd, $_POST['pregnant']);
 	$weeks_o_preg= mysqli_real_escape_string($bd, $_POST['weeks_o_preg']);
	$breastfeeding=mysqli_real_escape_string($bd, $_POST['breastfeeding']);
=======
    $patient_id= mysqli_real_escape_string($bd, htmlspecialchars($_POST['pat_id']));
 	$pregnant= mysqli_real_escape_string($bd, htmlspecialchars($_POST['pregnant']));
 	$weeks_o_preg= mysqli_real_escape_string($bd, htmlspecialchars($_POST['weeks_o_preg']));
	$breastfeeding=mysqli_real_escape_string($bd, htmlspecialchars($_POST['breastfeeding']));
>>>>>>> 6efad32ac1db985d04e400ec932fc4f3ad788296
    
    if ($pregnant=='Yes_preg'){
    $pregnant ='Yes';
    }
    if ($pregnant=='No_preg'){
    $pregnant ='No';
    }
 	
$insert_preg=" INSERT  INTO  pregnancy (pat_id,pregnant,weeks_o_preg,breastfeeding)
VALUES (
'$patient_id', '$pregnant', '$weeks_o_preg', '$breastfeeding')";

mysqli_query( $bd,$insert_preg);	
}

?>