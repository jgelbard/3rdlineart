<?php

if(isset($_POST['update_patD'])){ 
    
    $pat_id= mysql_real_escape_string(htmlspecialchars($_POST['pat_id']));
    $art_id_num= mysql_real_escape_string(htmlspecialchars($_POST['art_id_num']));
 	$firstname= mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
	$lastname=mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
 	$gender= mysql_real_escape_string(htmlspecialchars($_POST['gender']));
	$dob=mysql_real_escape_string(htmlspecialchars($_POST['dob']));
	$vl_sample_id=mysql_real_escape_string(htmlspecialchars($_POST['vl_sample_id']));
    
	$date_created= date('Y/m/d');

    
$sql_update_patient = "UPDATE patient 
SET art_id_num='$art_id_num',
       firstname ='$firstname',
       lastname ='$lastname',
       gender ='$gender',
       dob ='$dob',
       vl_sample_id ='$vl_sample_id',
       date_created ='$date_created'
       
       WHERE id='$pat_id'" ;

mysql_select_db('3rdlineart_db');
$patient_updated = mysql_query($sql_update_patient, $bd );    
    
    if ($patient_updated){
    
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Patient details updated</strong> 
                           
                           </div>
               ';
   
$current_clinical_status=mysql_query("SELECT * FROM current_clinical_status where patient_id='$pat_id' ", $bd);
        
$if_exist_current_clinical_status = mysql_num_rows ($current_clinical_status);

if ($if_exist_current_clinical_status =='0'){
    
echo"<meta http-equiv=\"Refresh\" content=\"0; url=app.php?app_clin&pat_id=".$pat_id."\">";
    
/*include ('includes/app_clinic_status.php');  */    
}

else {
  
    
 include ('includes/app_clinic_status_edit.php');     
    
}
        
         
    }
    else {
    echo "not updaated";
    
    }
}



?>