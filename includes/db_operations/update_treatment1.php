<?php

if(isset($_POST['update_treatment1'])){ 
    
    $patient_id= mysqli_real_escape_string($bd, $_GET['pat_id']);
       
    $sql_delete_treatment1 = "DELETE FROM treatment_history where pat_id =$patient_id";
    
    mysqli_query( $bd,$sql_delete_treatment1);
	
    if (mysqli_query($bd, $sql_delete_treatment1)){
    echo '							
<div class="alert alert-success">
                                                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                  <strong>ART treatment History updated</strong> 
                           
                           </div>
   ';
    }
    
    
 	$art_drug= mysqli_real_escape_string($bd, $_POST['art_drug']);
 	$art_drug_b= mysqli_real_escape_string($bd, $_POST['art_drug_b']);
 	$art_drug_c= mysqli_real_escape_string($bd, $_POST['art_drug_c']);
    //end drug row1
 	$start_date= mysqli_real_escape_string($bd, $_POST['start_date']);
	$stop_date=mysqli_real_escape_string($bd, $_POST['stop_date']);
	$reason_for_change=mysqli_real_escape_string($bd, $_POST['reason_for_change']);
    
    $art_drug2= mysqli_real_escape_string($bd, $_POST['art_drug2']);
    $art_drug2_b= mysqli_real_escape_string($bd, $_POST['art_drug2_b']);
    $art_drug2_c= mysqli_real_escape_string($bd, $_POST['art_drug2_c']);
     //end drug row2
 	$start_date2= mysqli_real_escape_string($bd, $_POST['start_date2']);
	$stop_date2=mysqli_real_escape_string($bd, $_POST['stop_date2']);
	$reason_for_change2=mysqli_real_escape_string($bd, $_POST['reason_for_change2']);
    
    $art_drug3= mysqli_real_escape_string($bd, $_POST['art_drug3']);
    $art_drug3_b= mysqli_real_escape_string($bd, $_POST['art_drug3_b']);
    $art_drug3_c= mysqli_real_escape_string($bd, $_POST['art_drug3_c']);
     //end drug row3
 	$start_date3= mysqli_real_escape_string($bd, $_POST['start_date3']);
	$stop_date3=mysqli_real_escape_string($bd, $_POST['stop_date3']);
	$reason_for_change3=mysqli_real_escape_string($bd, $_POST['reason_for_change3']);
    
    $art_drug4= mysqli_real_escape_string($bd, $_POST['art_drug4']);
    $art_drug4_b= mysqli_real_escape_string($bd, $_POST['art_drug4_b']);
    $art_drug4_c= mysqli_real_escape_string($bd, $_POST['art_drug4_c']);
     //end drug row4
 	$start_date4= mysqli_real_escape_string($bd, $_POST['start_date4']);
	$stop_date4=mysqli_real_escape_string($bd, $_POST['stop_date4']);
	$reason_for_change4=mysqli_real_escape_string($bd, $_POST['reason_for_change4']);
    
    $art_drug5= mysqli_real_escape_string($bd, $_POST['art_drug5']);
    $art_drug5_b= mysqli_real_escape_string($bd, $_POST['art_drug5_b']);
    $art_drug5_c= mysqli_real_escape_string($bd, $_POST['art_drug5_c']);
     //end drug row5
 	$start_date5= mysqli_real_escape_string($bd, $_POST['start_date5']);
	$stop_date5=mysqli_real_escape_string($bd, $_POST['stop_date5']);
	$reason_for_change5=mysqli_real_escape_string($bd, $_POST['reason_for_change5']);
    
    $art_drug6= mysqli_real_escape_string($bd, $_POST['art_drug6']);
    $art_drug6_b= mysqli_real_escape_string($bd, $_POST['art_drug6_b']);
    $art_drug6_c= mysqli_real_escape_string($bd, $_POST['art_drug6_c']);
     //end drug row6
 	$start_date6= mysqli_real_escape_string($bd, $_POST['start_date6']);
	$stop_date6=mysqli_real_escape_string($bd, $_POST['stop_date6']);
	$reason_for_change6=mysqli_real_escape_string($bd, $_POST['reason_for_change6']);
    
    $art_drug7= mysqli_real_escape_string($bd, $_POST['art_drug7']);
    $art_drug7_b= mysqli_real_escape_string($bd, $_POST['art_drug7_b']);
    $art_drug7_c= mysqli_real_escape_string($bd, $_POST['art_drug7_c']);
     //end drug row7
 	$start_date7= mysqli_real_escape_string($bd, $_POST['start_date7']);
	$stop_date7=mysqli_real_escape_string($bd, $_POST['stop_date7']);
	$reason_for_change7=mysqli_real_escape_string($bd, $_POST['reason_for_change7']);
    
    $art_drug8= mysqli_real_escape_string($bd, $_POST['art_drug8']);
    $art_drug8_b= mysqli_real_escape_string($bd, $_POST['art_drug8_b']);
    $art_drug8_c= mysqli_real_escape_string($bd, $_POST['art_drug8_c']);
     //end drug row8
 	$start_date8= mysqli_real_escape_string($bd, $_POST['start_date8']);
	$stop_date8=mysqli_real_escape_string($bd, $_POST['stop_date8']);
	$reason_for_change8=mysqli_real_escape_string($bd, $_POST['reason_for_change8']);
    
    $art_drug9= mysqli_real_escape_string($bd, $_POST['art_drug9']);
    $art_drug9_b= mysqli_real_escape_string($bd, $_POST['art_drug9_b']);
    $art_drug9_c= mysqli_real_escape_string($bd, $_POST['art_drug9_c']);
     //end drug row9
 	$start_date9= mysqli_real_escape_string($bd, $_POST['start_date9']);
	$stop_date9=mysqli_real_escape_string($bd, $_POST['stop_date9']);
	$reason_for_change9=mysqli_real_escape_string($bd, $_POST['reason_for_change9']);
    
     $art_drug10= mysqli_real_escape_string($bd, $_POST['art_drug10']);
     $art_drug10_b= mysqli_real_escape_string($bd, $_POST['art_drug10_b']);
     $art_drug10_c= mysqli_real_escape_string($bd, $_POST['art_drug10_c']);
     //end drug row10
 	$start_date10= mysqli_real_escape_string($bd, $_POST['start_date10']);
	$stop_date10=mysqli_real_escape_string($bd, $_POST['stop_date10']);
	$reason_for_change10=mysqli_real_escape_string($bd, $_POST['reason_for_change10']);
    
    
    
 if ($art_drug!='select drug'){	
     
     if ($art_drug_b!='select drug'){	
        $art_drug = $art_drug.'-'.$art_drug_b;  
     } 
     if ($art_drug_c!='select drug'){	
        $art_drug = $art_drug.'-'.$art_drug_c;  
     }
     
$insert_treatment_history=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug', '$start_date', '$stop_date', '$reason_for_change')";

mysqli_query( $bd,$insert_treatment_history);	
    
 }
    
if ($art_drug2 !='select drug'){
        
        
    if ($art_drug2_b!='select drug'){	
        $art_drug2 = $art_drug2.'-'.$art_drug2_b;  
     } 
     if ($art_drug2_c!='select drug'){	
        $art_drug2 = $art_drug2.'-'.$art_drug2_c;  
     }
     
    $insert_treatment_history2=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug2', '$start_date2', '$stop_date2', '$reason_for_change2')";

mysqli_query( $bd,$insert_treatment_history2);	
    
  }
    
if ($art_drug3 !='select drug'){
        
    if ($art_drug3_b!='select drug'){	
        $art_drug3 = $art_drug3.'-'.$art_drug3_b;  
     } 
     if ($art_drug3_c!='select drug'){	
        $art_drug3 = $art_drug3.'-'.$art_drug3_c;  
     }
     
    $insert_treatment_history3=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug3', '$start_date3', '$stop_date3', '$reason_for_change3')";

mysqli_query( $bd,$insert_treatment_history3);	
    
  }
    
if ($art_drug4 !='select drug'){
        
             
    if ($art_drug4_b!='select drug'){	
        $art_drug4 = $art_drug4.'-'.$art_drug4_b;  
     } 
     if ($art_drug4_c!='select drug'){	
        $art_drug4 = $art_drug4.'-'.$art_drug4_c;  
     }
     
    $insert_treatment_history4=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug4', '$start_date4', '$stop_date4', '$reason_for_change4')";

mysqli_query( $bd,$insert_treatment_history4);	
    
   }
    
if ($art_drug5 !='select drug'){
        
    if ($art_drug5_b!='select drug'){	
        $art_drug5 = $art_drug5.'-'.$art_drug5_b;  
     } 
     if ($art_drug5_c!='select drug'){	
        $art_drug5 = $art_drug5.'-'.$art_drug5_c;  
     }
     
    $insert_treatment_history5=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug5', '$start_date5', '$stop_date5', '$reason_for_change5')";

mysqli_query( $bd,$insert_treatment_history5);	
    }
    
if ($art_drug6 !='select drug'){
    
    if ($art_drug6_b!='select drug'){	
        $art_drug6 = $art_drug6.'-'.$art_drug6_b;  
     } 
     if ($art_drug6_c!='select drug'){	
        $art_drug6 = $art_drug6.'-'.$art_drug6_c;  
     }
     
    
    $insert_treatment_history6=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug6', '$start_date6', '$stop_date6', '$reason_for_change6')";

mysqli_query( $bd,$insert_treatment_history6);	
    }
    
 	
if ($art_drug7 !='select drug'){
    
    if ($art_drug7_b!='select drug'){	
        $art_drug7 = $art_drug7.'-'.$art_drug7_b;  
     } 
     if ($art_drug7_c!='select drug'){	
        $art_drug7 = $art_drug7.'-'.$art_drug7_c;  
     }
     
    $insert_treatment_history7=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug7', '$start_date7', '$stop_date7', '$reason_for_change7')";

mysqli_query( $bd,$insert_treatment_history7);	
    }
 	
if ($art_drug8 !='select drug'){
    
    if ($art_drug8_b!='select drug'){	
        $art_drug8 = $art_drug8.'-'.$art_drug8_b;  
     } 
     if ($art_drug8_c!='select drug'){	
        $art_drug8 = $art_drug8.'-'.$art_drug8_c;  
     }
     
    $insert_treatment_history8=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug8', '$start_date8', '$stop_date8', '$reason_for_change8')";

mysqli_query( $bd,$insert_treatment_history8);	
    }
 	
if ($art_drug9 !='select drug'){
    
    if ($art_drug9_b!='select drug'){	
        $art_drug9 = $art_drug9.'-'.$art_drug9_b;  
     } 
     if ($art_drug9_c!='select drug'){	
        $art_drug9 = $art_drug9.'-'.$art_drug9_c;  
     }
     
    $insert_treatment_history9=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug9', '$start_date9', '$stop_date9', '$reason_for_change9')";

mysqli_query( $bd,$insert_treatment_history9);	
    }
if ($art_drug10 !='select drug'){
    
    if ($art_drug10_b!='select drug'){	
        $art_drug10 = $art_drug10.'-'.$art_drug10_b;  
     } 
     if ($art_drug10_c!='select drug'){	
        $art_drug10 = $art_drug10.'-'.$art_drug10_c;  
     }
     
    $insert_treatment_history10=" INSERT  INTO  treatment_history (pat_id,art_drug,start_date,stop_date,reason_for_change)
VALUES (
'$patient_id', '$art_drug10', '$start_date10', '$stop_date10', '$reason_for_change10')";

mysqli_query( $bd,$insert_treatment_history10);	
    }
 	
  
}

?>