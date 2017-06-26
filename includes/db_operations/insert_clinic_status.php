<?php

if(isset($_POST['submit_clinicstatus'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_POST['pat_id']));
 	$who_stage= mysql_real_escape_string(htmlspecialchars($_POST['who_stage']));
 	$curr_who_stage= mysql_real_escape_string(htmlspecialchars($_POST['curr_who_stage']));
	$weight=mysql_real_escape_string(htmlspecialchars($_POST['weight']));
 	$height= mysql_real_escape_string(htmlspecialchars($_POST['height']));
	$art_interrup=mysql_real_escape_string(htmlspecialchars($_POST['art_interrup']));
	$h_o_ss_effects=mysql_real_escape_string(htmlspecialchars($_POST['pat_id']));
	$ol_6months=mysql_real_escape_string(htmlspecialchars($_POST['ol_6months']));
	$sig_diarrhea_vom=mysql_real_escape_string(htmlspecialchars($_POST['sig_diarrhea_vom']));
	$alco_drug_consump=mysql_real_escape_string(htmlspecialchars($_POST['alco_drug_consump']));
	$trad_med=mysql_real_escape_string(htmlspecialchars($_POST['trad_med']));
	$co_medi=mysql_real_escape_string(htmlspecialchars($_POST['co_medi']));
	$other_curr_problem=mysql_real_escape_string(htmlspecialchars($_POST['other_curr_problem']));
	
	$PeripheralNeuropathy=mysql_real_escape_string(htmlspecialchars($_POST['PeripheralNeuropathy']));
	$Jaundice=mysql_real_escape_string(htmlspecialchars($_POST['Jaundice']));
	$Lipodystrophy=mysql_real_escape_string(htmlspecialchars($_POST['Lipodystrophy']));
	$KidneyFailure=mysql_real_escape_string(htmlspecialchars($_POST['KidneyFailure']));
	$Psychosis=mysql_real_escape_string(htmlspecialchars($_POST['Psychosis']));
	$Gynecomastia=mysql_real_escape_string(htmlspecialchars($_POST['Gynecomastia']));
	$Anemia=mysql_real_escape_string(htmlspecialchars($_POST['Anemia']));
	$other=mysql_real_escape_string(htmlspecialchars($_POST['sdef_other']));
    
  //if yes details 
    if ($art_interrup=='Yes'){
        
    $art_interrup_date=mysql_real_escape_string(htmlspecialchars($_POST['art_interrup_date']));
    $art_interrup_reason=mysql_real_escape_string(htmlspecialchars($_POST['art_interrup_reason']));
   
    }
    
     if ($ol_6months=='Yes'){
	$ol_6months_date=mysql_real_escape_string(htmlspecialchars($_POST['ol_6months_date']));
	$ol_6months_dign=mysql_real_escape_string(htmlspecialchars($_POST['ol_6months_dign']));
         
     }
    $sig_diarrhea_vom_details ="";
    $alco_drug_consump_details="";
    $trad_med_details="";
    $co_medi_details="";
    $other_curr_problem_details="";
        
    if(isset($_POST['sig_diarrhea_vom_details'])){
	$sig_diarrhea_vom_details=mysql_real_escape_string(htmlspecialchars($_POST['sig_diarrhea_vom_details']));
    }
    if(isset($_POST['alco_drug_consump_details'])){
	$alco_drug_consump_details=mysql_real_escape_string(htmlspecialchars($_POST['alco_drug_consump_details']));
    }
    if(isset($_POST['trad_med_details'])){
	$trad_med_details=mysql_real_escape_string(htmlspecialchars($_POST['trad_med_details']));
    }
    if(isset($_POST['co_medi_details'])){
	$co_medi_details=mysql_real_escape_string(htmlspecialchars($_POST['co_medi_details']));
    }
    if(isset($_POST['other_curr_problem_details'])){
	$other_curr_problem_details=mysql_real_escape_string(htmlspecialchars($_POST['other_curr_problem_details']));
    
    }
    

$insert_patient=" INSERT  INTO current_clinical_status (patient_id,who_stage,curr_who_stage,weight,height,art_interrup,h_o_ss_effects, ol_6months, sig_diarrhea_vom, alco_drug_consump, trad_med, co_medi, other_curr_problem)
VALUES (
'$patient_id', '$who_stage', '$curr_who_stage', '$weight', '$height', '$art_interrup', '$h_o_ss_effects', '$ol_6months', '$sig_diarrhea_vom', '$alco_drug_consump', '$trad_med', '$co_medi', '$other_curr_problem' )";

mysql_query($insert_patient, $bd);	
  
    
    
 $insert_current_clinical_status_details=" INSERT  INTO current_clinical_status_details (pat_id,sig_diarrhea_vom_details,alco_drug_consump_details,trad_med_details,co_medi_details, other_curr_problem_details)
VALUES (
'$patient_id', '$sig_diarrhea_vom_details', '$alco_drug_consump_details', '$trad_med_details', '$co_medi_details', '$other_curr_problem_details' )";

mysql_query($insert_current_clinical_status_details, $bd);	
       
    
    
$insert_pat_side_effect=" INSERT  INTO patient_side_effects (patient_id,PeripheralNeuropathy,Jaundice,Lipodystrophy,Psychosis,Gynecomastia,Anemia,other)
VALUES (
'$patient_id', '$Jaundice', '$Lipodystrophy', '$KidneyFailure', '$Psychosis', '$Gynecomastia','$Anemia','$other')";

mysql_query($insert_pat_side_effect, $bd);	  
    
 if ($art_interrup=='Yes'){   
$insert_art_interruption=" INSERT  INTO art_interruption (patient_id,reason,date)
VALUES (
'$patient_id', '$art_interrup_reason', '$art_interrup_date')";

mysql_query($insert_art_interruption, $bd);	  
    
 }
    
    
if ($ol_6months=='Yes'){   
$insert_ol_6months_details=" INSERT  INTO ol_6months_details (patient_id,ol_6months_dign,ol_6months_date)
VALUES (
'$patient_id', '$ol_6months_dign', '$ol_6months_date')";

mysql_query($insert_ol_6months_details, $bd);	  
    
 }
    
 if(isset($_GET['xx'])){ 
$age= $_GET['xx'];
}
   
$patient=mysql_query("SELECT * FROM patient where id='$patient_id' ", $bd); 
    $row_pat=mysql_fetch_array($patient);
        
        $art_id_num =$row_pat['art_id_num'];
        $firstname =$row_pat['firstname'];
        $lastname =$row_pat['lastname'];
        $gender =$row_pat['gender'];
        $dob =$row_pat['dob'];
        $vl_sample_id =$row_pat['vl_sample_id'];
    
 echo"<meta http-equiv=\"Refresh\" content=\"1; url=app.php?back_3&pat_id=".$patient_id."&g=".$gender."&xx=".$age."\">";
    
}



?>