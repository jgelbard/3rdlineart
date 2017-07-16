<?php
global $gender;
if(isset($_POST['submit_patD'])){ 
    
   /* $id = date("ymdhis");
	*/

    $pat_art_clinic= mysqli_real_escape_string($bd, $_POST['pat_art_clinic']);
    $art_id_num= mysqli_real_escape_string($bd, $_POST['art_id_num']);
 	$firstname= mysqli_real_escape_string($bd, $_POST['firstname']);
	$lastname=mysqli_real_escape_string($bd, $_POST['lastname']);
 	$gender= mysqli_real_escape_string($bd, $_POST['gender']);
	$dob=mysqli_real_escape_string($bd, $_POST['dob']);
	$vl_sample_id=mysqli_real_escape_string($bd, $_POST['vl_sample_id']);
	$date_created= date('Y/m/d');

        
    $check_patient=mysqli_query( $bd,"SELECT * FROM patient where art_id_num='$art_id_num' "); 
    $patient_Exist = mysqli_num_rows ($check_patient);
    
    if ($patient_Exist =='0'){

$insert_patient=" INSERT  INTO patient(pat_art_clinic,art_id_num,firstname,lastname,gender,dob,vl_sample_id, date_created)
VALUES (
'$pat_art_clinic','$art_id_num', '$firstname', '$lastname', '$gender', '$dob', '$vl_sample_id', '$date_created' )";

mysqli_query( $bd,$insert_patient);	
    
 
 $patient=mysqli_query( $bd,"SELECT * FROM patient where art_id_num ='$art_id_num' "); 

    global $pat_id;	
    while ($row_pat=mysqli_fetch_array($patient)){
        $pat_id =$row_pat['id'];
       /* echo '3rdLineID:'.$row_pat['id'];*/

    }   
    
    //creating form identifier 
    
$insert_form_creation=" INSERT  INTO form_creation (clinician_id,patient_id,status, date_created)
VALUES (
 '$clinicianID', '$pat_id', 'Not Complete', '$date_created' )";

mysqli_query( $bd,$insert_form_creation);	    
    
 include ('includes/app_clinic_status.php');     
}
    else {
    
    echo '
        <div class="alert alert-block">
                                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                      <h4>Failed!!</h4>
                                                      Patient with ART number already exist.
                                                    </div> ';  
        
    echo"<meta http-equiv=\"Refresh\" content=\"2; url=app.php?return_part_1\">";
    }
}

?>