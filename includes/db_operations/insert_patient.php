<?php
global $gender;
if(isset($_POST['submit_patD'])){ 
    
   /* $id = date("ymdhis");
	*/
    $pat_art_clinic= mysql_real_escape_string(htmlspecialchars($_POST['pat_art_clinic']));
    $art_id_num= mysql_real_escape_string(htmlspecialchars($_POST['art_id_num']));
 	$firstname= mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
	$lastname=mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
 	$gender= mysql_real_escape_string(htmlspecialchars($_POST['gender']));
	$dob=mysql_real_escape_string(htmlspecialchars($_POST['dob']));
	$vl_sample_id=mysql_real_escape_string(htmlspecialchars($_POST['vl_sample_id']));
	$date_created= date('Y/m/d');

        
    $check_patient=mysql_query("SELECT * FROM patient where art_id_num='$art_id_num' ", $bd); 
    $patient_Exist = mysql_num_rows ($check_patient);
    
    if ($patient_Exist =='0'){

$insert_patient=" INSERT  INTO patient(pat_art_clinic,art_id_num,firstname,lastname,gender,dob,vl_sample_id, date_created)
VALUES (
'$pat_art_clinic','$art_id_num', '$firstname', '$lastname', '$gender', '$dob', '$vl_sample_id', '$date_created' )";

mysql_query($insert_patient, $bd);	
    
 
 $patient=mysql_query("SELECT * FROM patient where art_id_num ='$art_id_num' ", $bd); 

    global $pat_id;	
    while ($row_pat=mysql_fetch_array($patient)){
        $pat_id =$row_pat['id'];
       /* echo '3rdLineID:'.$row_pat['id'];*/

    }   
    
    //creating form identifier 
    
$insert_form_creation=" INSERT  INTO form_creation (clinician_id,patient_id,status, date_created)
VALUES (
 '$clinicianID', '$pat_id', 'Not Complete', '$date_created' )";

mysql_query($insert_form_creation, $bd);	    
    
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