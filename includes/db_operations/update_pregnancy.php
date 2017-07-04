<?php

if(isset($_POST['update_Preg'])){ 
	
    $pat_id= mysqli_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
     $sql_delete_pregnancy = "DELETE FROM  pregnancy where pat_id =$pat_id";
    mysqli_query( $bd,$sql_delete_pregnancy);
    
   
 	$pregnant= mysqli_real_escape_string(htmlspecialchars($_POST['pregnant']));
 	$weeks_o_preg= mysqli_real_escape_string(htmlspecialchars($_POST['weeks_o_preg']));
	$breastfeeding=mysqli_real_escape_string(htmlspecialchars($_POST['breastfeeding']));
    
    if ($pregnant=='Yes_preg'){
    $pregnant ='Yes';
    }
    if ($pregnant=='No_preg'){
    $pregnant ='No';
    }
     
 
$insert_preg=" INSERT  INTO  pregnancy (pat_id,pregnant,weeks_o_preg,breastfeeding)
VALUES (
'$pat_id', '$pregnant', '$weeks_o_preg', '$breastfeeding')";

mysqli_query( $bd,$insert_preg);	
   
  
    echo '								
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Pregnancy details updated</strong> 
                           
                           </div>
               ';
        
        include ('includes/app_treatment1_edit.php');   
    
}

?>