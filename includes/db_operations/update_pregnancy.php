<?php

if(isset($_POST['update_Preg'])){ 
	
    $pat_id= mysql_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
     $sql_delete_pregnancy = "DELETE FROM  pregnancy where pat_id =$pat_id";
    mysql_query($sql_delete_pregnancy, $bd);
    
   
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
'$pat_id', '$pregnant', '$weeks_o_preg', '$breastfeeding')";

mysql_query($insert_preg, $bd);	
   
  
    echo '								
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Pregnancy details updated</strong> 
                           
                           </div>
               ';
        
        include ('includes/app_treatment1_edit.php');   
    
}

?>