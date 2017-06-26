<?php

if(isset($_POST['submit_treatment1'])){ 
	
    $patient_id= mysql_real_escape_string(htmlspecialchars($_GET['pat_id']));
    
 	$art_drug= mysql_real_escape_string(htmlspecialchars($_POST['art_drug']));
 	$start_date= mysql_real_escape_string(htmlspecialchars($_POST['start_date']));
	$stop_date=mysql_real_escape_string(htmlspecialchars($_POST['stop_date']));
	$reason_for_change=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change']));
    
    $art_drug2= mysql_real_escape_string(htmlspecialchars($_POST['art_drug2']));
 	$start_date2= mysql_real_escape_string(htmlspecialchars($_POST['start_date2']));
	$stop_date2=mysql_real_escape_string(htmlspecialchars($_POST['stop_date2']));
	$reason_for_change2=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change2']));
    
    $art_drug3= mysql_real_escape_string(htmlspecialchars($_POST['art_drug3']));
 	$start_date3= mysql_real_escape_string(htmlspecialchars($_POST['start_date3']));
	$stop_date3=mysql_real_escape_string(htmlspecialchars($_POST['stop_date3']));
	$reason_for_change3=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change3']));
    
    $art_drug4= mysql_real_escape_string(htmlspecialchars($_POST['art_drug4']));
 	$start_date4= mysql_real_escape_string(htmlspecialchars($_POST['start_date4']));
	$stop_date4=mysql_real_escape_string(htmlspecialchars($_POST['stop_date4']));
	$reason_for_change4=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change4']));
    
    $art_drug5= mysql_real_escape_string(htmlspecialchars($_POST['art_drug5']));
 	$start_date5= mysql_real_escape_string(htmlspecialchars($_POST['start_date5']));
	$stop_date5=mysql_real_escape_string(htmlspecialchars($_POST['stop_date5']));
	$reason_for_change5=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change5']));
    
    $art_drug6= mysql_real_escape_string(htmlspecialchars($_POST['art_drug6']));
 	$start_date6= mysql_real_escape_string(htmlspecialchars($_POST['start_date6']));
	$stop_date6=mysql_real_escape_string(htmlspecialchars($_POST['stop_date6']));
	$reason_for_change6=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change6']));
    
    $art_drug7= mysql_real_escape_string(htmlspecialchars($_POST['art_drug7']));
 	$start_date7= mysql_real_escape_string(htmlspecialchars($_POST['start_date7']));
	$stop_date7=mysql_real_escape_string(htmlspecialchars($_POST['stop_date7']));
	$reason_for_change7=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change7']));
    
    $art_drug8= mysql_real_escape_string(htmlspecialchars($_POST['art_drug8']));
 	$start_date8= mysql_real_escape_string(htmlspecialchars($_POST['start_date8']));
	$stop_date8=mysql_real_escape_string(htmlspecialchars($_POST['stop_date8']));
	$reason_for_change8=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change8']));
    
    $art_drug9= mysql_real_escape_string(htmlspecialchars($_POST['art_drug9']));
 	$start_date9= mysql_real_escape_string(htmlspecialchars($_POST['start_date9']));
	$stop_date9=mysql_real_escape_string(htmlspecialchars($_POST['stop_date9']));
	$reason_for_change9=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change9']));
    
     $art_drug10= mysql_real_escape_string(htmlspecialchars($_POST['art_drug10']));
 	$start_date10= mysql_real_escape_string(htmlspecialchars($_POST['start_date10']));
	$stop_date10=mysql_real_escape_string(htmlspecialchars($_POST['stop_date10']));
	$reason_for_change10=mysql_real_escape_string(htmlspecialchars($_POST['reason_for_change10']));
    
    
    
 if ($art_drug!='select drug'){	
$insert_treatment_history=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug', '$start_date', '$stop_date', '$reason_for_change')";

mysql_query($insert_treatment_history, $bd);	
    
 }
    
    if ($art_drug2 !='select drug'){	
    $insert_treatment_history2=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug2', '$start_date2', '$stop_date2', '$reason_for_change2')";

mysql_query($insert_treatment_history2, $bd);	
    
  }
    
    if ($art_drug3 !='select drug'){	   
    $insert_treatment_history3=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug3', '$start_date3', '$stop_date3', '$reason_for_change3')";

mysql_query($insert_treatment_history3, $bd);	
    
  }
    
    if ($art_drug4 !='select drug'){	   
    $insert_treatment_history4=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug4', '$start_date4', '$stop_date4', '$reason_for_change4')";

mysql_query($insert_treatment_history4, $bd);	
    
   }
    
    if ($art_drug5 !='select drug'){	  
    $insert_treatment_history5=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug5', '$start_date5', '$stop_date5', '$reason_for_change5')";

mysql_query($insert_treatment_history5, $bd);	
    }
 	 if ($art_drug6 !='select drug'){	  
    $insert_treatment_history6=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug6', '$start_date6', '$stop_date6', '$reason_for_change6')";

mysql_query($insert_treatment_history6, $bd);	
    }
 	if ($art_drug7 !='select drug'){	  
    $insert_treatment_history7=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug7', '$start_date7', '$stop_date7', '$reason_for_change7')";

mysql_query($insert_treatment_history7, $bd);	
    }
 	
  if ($art_drug8 !='select drug'){	  
    $insert_treatment_history8=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug8', '$start_date8', '$stop_date8', '$reason_for_change8')";

mysql_query($insert_treatment_history8, $bd);	
    }
 	
  if ($art_drug9 !='select drug'){	  
    $insert_treatment_history9=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug9', '$start_date9', '$stop_date9', '$reason_for_change9')";

mysql_query($insert_treatment_history9, $bd);	
    }
 	if ($art_drug10 !='select drug'){	  
    $insert_treatment_history10=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug10', '$start_date10', '$stop_date10', '$reason_for_change10')";

mysql_query($insert_treatment_history10, $bd);	
    }
 	
  
}

?>