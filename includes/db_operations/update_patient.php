<?php
if(isset($_POST['update_patD'])) { 
    $pat_id = mysqli_real_escape_string($bd, $_POST['pat_id']);
    $art_id_num = mysqli_real_escape_string($bd, $_POST['art_id_num']);
 	$firstname = mysqli_real_escape_string($bd, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($bd, $_POST['lastname']);
 	$gender = mysqli_real_escape_string($bd, $_POST['gender']);
	$dob = mysqli_real_escape_string($bd, $_POST['dob']);
	$vl_sample_id = mysqli_real_escape_string($bd, $_POST['vl_sample_id']);
	$date_created = date('Y/m/d');
    
    $sql_update_patient = "UPDATE patient 
SET art_id_num = '$art_id_num',
       firstname = '$firstname',
       lastname = '$lastname',
       gender = '$gender',
       dob = '$dob',
       vl_sample_id = '$vl_sample_id',
       date_created = '$date_created'       
       WHERE id = '$pat_id'" ;

// mysqli_select_db($bd, '3rdlineart_db');
    $patient_updated = mysqli_query( $bd ,$sql_update_patient);    
    
    if ($patient_updated) {
        echo '<div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong>Patient details updated</strong>             
          </div>';
   
        $current_clinical_status=mysqli_query( $bd,"SELECT * FROM current_clinical_status where patient_id='$pat_id' ");
        $if_exist_current_clinical_status = mysqli_num_rows ($current_clinical_status);

        if ($if_exist_current_clinical_status == '0') {
            echo"<meta http-equiv=\"Refresh\" content=\"0; url=app.php?app_clin&pat_id=".$pat_id."\">";    
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