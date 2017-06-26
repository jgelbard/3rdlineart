<?php

if(isset($_POST['update_adher'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
   
    
    $sql_delete_lab = "DELETE FROM  lab where pat_id =$patient_id";
    mysql_query($sql_delete_lab, $bd);
    
    $sql_delete_adherence = "DELETE FROM  adherence where pat_id =$patient_id";
    mysql_query($sql_delete_adherence, $bd);
    
    $sql_delete_adherence_questions = "DELETE FROM  adherence_questions where pat_id =$patient_id";
    mysql_query($sql_delete_adherence_questions, $bd);
    
	
    if (mysql_query($sql_delete_adherence_questions, $bd)){
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>Client Application updated</strong> 
                           
                           </div>
   ';
    }
    
    
 	$scheduled_visit_date1= mysql_real_escape_string(htmlspecialchars($_POST['scheduled_visit_date1']));
 	$actual_visit_date1= mysql_real_escape_string(htmlspecialchars($_POST['actual_visit_date1']));
	$pill_count1=mysql_real_escape_string(htmlspecialchars($_POST['pill_count1']));
    
    $scheduled_visit_date2= mysql_real_escape_string(htmlspecialchars($_POST['scheduled_visit_date2']));
 	$actual_visit_date2= mysql_real_escape_string(htmlspecialchars($_POST['actual_visit_date2']));
	$pill_count2=mysql_real_escape_string(htmlspecialchars($_POST['pill_count2']));
    
    $scheduled_visit_date3= mysql_real_escape_string(htmlspecialchars($_POST['scheduled_visit_date3']));
 	$actual_visit_date3= mysql_real_escape_string(htmlspecialchars($_POST['actual_visit_date3']));
	$pill_count3=mysql_real_escape_string(htmlspecialchars($_POST['pill_count3']));
    
    //adherence questions 
    $ever_forget_2_take_meds= mysql_real_escape_string(htmlspecialchars($_POST['ever_forget_2_take_meds']));
 	$careless_taking_meds= mysql_real_escape_string(htmlspecialchars($_POST['careless_taking_meds']));
	$stop_taking_meds=mysql_real_escape_string(htmlspecialchars($_POST['stop_taking_meds']));
	$not_taken_meds=mysql_real_escape_string(htmlspecialchars($_POST['not_taken_meds']));
	$taken_meds_past_weekend=mysql_real_escape_string(htmlspecialchars($_POST['taken_meds_past_weekend']));
	$_3months_days_not_taken_meds=mysql_real_escape_string(htmlspecialchars($_POST['3months_days_not_taken_meds']));
    
    //lab data
	$creatinine=mysql_real_escape_string(htmlspecialchars($_POST['creatinine']));
	$hb=mysql_real_escape_string(htmlspecialchars($_POST['hb']));
	$alt=mysql_real_escape_string(htmlspecialchars($_POST['alt']));
	$bilirubin=mysql_real_escape_string(htmlspecialchars($_POST['bilirubin']));
	$hepbag=mysql_real_escape_string(htmlspecialchars($_POST['hepbag']));
       
 	
$insert_adherence=" INSERT  INTO adherence (pat_id,scheduled_visit_date1,actual_visit_date1,pill_count1,scheduled_visit_date2,actual_visit_date2,pill_count2,scheduled_visit_date3,actual_visit_date3,pill_count3)
VALUES (
'$patient_id', '$scheduled_visit_date1', '$actual_visit_date1', '$pill_count1','$scheduled_visit_date2', '$actual_visit_date2', '$pill_count2', '$scheduled_visit_date3', '$actual_visit_date3', '$pill_count3')";

mysql_query($insert_adherence, $bd);	
    
  //insert adherence questions
$insert_adherence_questions=" INSERT  INTO adherence_questions (pat_id,ever_forget_2_take_meds,careless_taking_meds,stop_taking_meds,not_taken_meds,taken_meds_past_weekend,3months_days_not_taken_meds)
VALUES (
'$patient_id', '$ever_forget_2_take_meds', '$careless_taking_meds', '$stop_taking_meds','$not_taken_meds', '$taken_meds_past_weekend', '$_3months_days_not_taken_meds')";

mysql_query($insert_adherence_questions, $bd);	  
 
    //insert LAB data
$insert_lab=" INSERT  INTO lab (pat_id,creatinine,hb,alt,bilirubin,hepbag)
VALUES (
'$patient_id', '$creatinine', '$hb', '$alt','$bilirubin', '$hepbag')";

mysql_query($insert_lab, $bd);	  
    
}

?>